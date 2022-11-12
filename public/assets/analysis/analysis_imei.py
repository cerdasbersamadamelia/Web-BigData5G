# Import library yang diperlukan
import glob
import pandas as pd
from sqlalchemy import create_engine

# # Membaca data IMEI
# pd.set_option('display.max_rows', 500)
# pd.set_option('display.max_columns', 500)
# pd.set_option('display.width', 1000)

# file = glob.glob("assets/analysis/*.zip")
# # print(file)

# df = [pd.read_csv(f, sep=',', skiprows=[0]) for f in file]
# df = pd.concat(df, ignore_index=True)
# # print(df.head(5))

# # Mengubah string menjadi bentuk title pada kolom 'kecamatan'
# df['kecamatan'] = df['kecamatan'].str.title()
# # print(df.head(5))

# # Jumlah semua user 4G di wilayah Depok
# total = df['fiveg'].count()
# # print(total)

# # Jumlah user 4G yang support 5G di Depok
# sup5g = df.loc[df['fiveg'] == 'yes', ['fiveg']].shape[0]
# # print(sup5g)

# # Presentase rata-rata user yang support 5G di Depok
# sup5g_depok = (sup5g/total)*100
# # print(sup5g_depok)

# # Jumlah user 4G yang support 5G pada setiap kecamatan di Depok
# kec = df['kecamatan'].unique()
# # print(kec)

# # Jumlah user di setiap kecamatan
# total_kec = []
# for x in kec:
#     a = df.loc[df['kecamatan'] == x].shape[0]
#     total_kec.append(a)
# # print(total_kec)

# # Jumlah user support 5G
# kec_sup5g = []
# for x in kec:
#     b = df.loc[df['fiveg'] == 'yes'].loc[df['kecamatan'] == x].shape[0]
#     kec_sup5g.append(b)
# # print(kec_sup5g)

# # Presentase rata-rata user yang support 5G pada setiap kecamatan di Depok
# per_kec_sup5g = [(x / y)*100 for x, y in zip(kec_sup5g, total_kec)]
# # print(per_kec_sup5g)

# # Membuat dataframe untuk menyimpan hasil perhitungan diatas
# df2 = pd.DataFrame(list(zip(kec, kec_sup5g, per_kec_sup5g)),
#                    columns=['kecamatan imei', 'user support 5G', 'percentage_percent'])
# # print(df2)

# # Menentukan kecamatan yang direkomendasikan untuk pengembangan coverage 5G


# def recommendation(row):
#     if row['percentage_percent'] >= sup5g_depok:
#         val = 'Yes'
#     else:
#         val = 'No'
#     return val


# df2['recommended imei'] = df2.apply(recommendation, axis=1)
# # print(df2)

# # Mengurutkan hasil rekomendasi dari nilai yang terbesar ke terkecil
# df2.sort_values(by=['percentage_percent'], inplace=True, ascending=False)
# df2.insert(loc=0, column='no imei', value=range(1, 1 + len(df2)))
# # print(df2)

# # Menambahkan kolom 'time'
# time = str(df.iloc[0]['date_time'])
# df2.insert(loc=1, column='time', value=time[0:6])
# # print(df2)

# Menyimpan hasil summary imei ke database
my_engine = create_engine(
    "mysql+mysqlconnector://root:@localhost:3306/web_bigdata5g", echo=False)
# "mysql+mysqlconnector://username:password0@host:port/databasename"

# read csv summary imei
df3 = pd.read_csv('assets/analysis/summary_imei.csv', sep=',')
try:
    df3.to_sql(name='summary_imei', con=my_engine,
               if_exists='replace', index=False)
    print('Successfully update summary imei<br>')
    # my_engine.execute(
    #     "UPDATE `threshold` SET `imei_threshold`="+str(imei_depok))
    # print("Successfully update imei threshold")
except:
    print('Failed to save summary imei')
