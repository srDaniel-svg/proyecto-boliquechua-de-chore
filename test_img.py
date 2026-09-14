import urllib.request
import re

url1 = "https://www.soysantacruz.com.bo/SSCB_Contenidos.php?CualForAux=general&CualBasAux=sscb&CualTabAux=leyendas&CualOpcAux=19&CualSubOpcAux=CO-01_El-Carreton-de-la-Otra-Vida."
url2 = "https://www.soysantacruz.com.bo/SSCB_Contenidos.php?CualForAux=general&CualBasAux=sscb&CualTabAux=leyendas&CualOpcAux=19&CualSubOpcAux=CO-01_La-Viudita."

html1 = urllib.request.urlopen(url1).read().decode('utf-8', errors='ignore')
print("1", re.findall(r'<img[^>]+src=["\']([^"\']+)["\']', html1))

html2 = urllib.request.urlopen(url2).read().decode('utf-8', errors='ignore')
print("2", re.findall(r'<img[^>]+src=["\']([^"\']+)["\']', html2))
