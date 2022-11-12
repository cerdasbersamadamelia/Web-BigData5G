# Import library yang diperlukan
import pandas as pd
import mysql.connector
from sqlalchemy import create_engine

# Membaca data payload
pd.set_option('display.max_rows', 500)
pd.set_option('display.max_columns', 500)
pd.set_option('display.width', 1000)

df = pd.read_csv("assets/analysis/payload_4g_depok.csv")
# print(df.head(5))

# print(df.shape)

# # Mengubah string menjadi bentuk title pada kolom 'kecamatan'
df['kecamatan'] = df['kecamatan'].str.title()
# print(df.head(5))

# # Memeriksa null value
# print(df.isna().sum())

# # Menghapus null value
df = df.dropna()
# print(df.shape)

# # Memeriksa outliar data
# df.boxplot('total_traffic_volume_mbyte')

# # Menghapus outliar data
Q1, Q3 = df['total_traffic_volume_mbyte'].quantile([0.25, 0.75])
IQR = Q3 - Q1
lower_limit = Q1 - (1.5*IQR)
upper_limit = Q3 + (1.5*IQR)
df = df[(df['total_traffic_volume_mbyte'] > lower_limit) &
        (df['total_traffic_volume_mbyte'] < upper_limit)]
# print(df.head(5))

# print(df.shape)

# # Menghitung rata-rata Payload yang digunakan di Depok
payload_depok = df["total_traffic_volume_mbyte"].mean()
# print(payload_depok)

# Menghitung rata-rata Payload yang digunakan pada setiap kecamatan di Depok

# Nama kecamatan
kec = df['kecamatan'].unique()
# print(kec)

# Rata-rata payload
payload_kec = []
for x in kec:
    kec2 = df.loc[df['kecamatan'] == x]
    rata = kec2["total_traffic_volume_mbyte"].mean()
    payload_kec.append(rata)
# print(payload_depok)

# Membuat dataframe untuk menyimpan hasil perhitungan diatas
df2 = pd.DataFrame(list(zip(kec, payload_kec)),
                   columns=['kecamatan payload', 'payload_mbyte'])
# print(df2)

# Menentukan kecamatan yang direkomendasikan untuk pengembangan coverage 5G


def recommendation(row):
    if row['payload_mbyte'] >= payload_depok:
        val = 'Yes'
    else:
        val = 'No'
    return val


df2['recommended payload'] = df2.apply(recommendation, axis=1)
# print(df2)

# Mengurutkan hasil rekomendasi dari nilai yang terbesar ke terkecil
df2.sort_values(by=['payload_mbyte'], inplace=True, ascending=False)
df2.insert(loc=0, column='no payload', value=range(1, 1 + len(df2)))

# Menambahkan kolom 'time'
data_date = str(df.iloc[0]['tanggal'])
df2.insert(loc=1, column='time', value=data_date[0:6])
# print(df2)

# Menyimpan hasil dataframe ke file CSV
df2.to_csv('assets/analysis/summary_payload.csv', index=False)

# Menyimpan hasil summary dan payload threshold ke database
my_engine = create_engine(
    "mysql+mysqlconnector://root:@localhost:3306/web_bigdata5g", echo=False)
# "mysql+mysqlconnector://username:password0@host:port/databasename"

# read csv summary payload
df3 = pd.read_csv('assets/analysis/summary_payload.csv', sep=',')
try:
    df3.to_sql(name='summary_payload', con=my_engine,
               if_exists='replace', index=False)
    print('Successfully update summary payload<br>')
    my_engine.execute(
        "UPDATE `threshold` SET `payload_threshold`="+str(payload_depok))
    print("Successfully update payload threshold")
except:
    print('Failed to save summary & payload threshold')
