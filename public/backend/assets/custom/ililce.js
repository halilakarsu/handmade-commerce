// JSON verisini buraya ekleyin
const illerIlceler = {
  "Adana": ["Aladağ", "Ceyhan", "Çukurova", "Feke", "İmamoğlu", "Karaisalı", "Karataş", "Kozan", "Pozantı", "Saimbeyli", "Sarıçam", "Sevgi", "Tufanbeyli", "Yumurtalık", "Yüreğir"],
  "Adıyaman": ["Besni", "Çelikhan", "Gerger", "Gölbaşı", "Kahta", "Merkez", "Samsat", "Sincik", "Tut"],
  "Afyonkarahisar": ["Bolvadin", "Çay", "Dinar", "Emirdağ", "Kızılören", "Merkez", "Sultandağı", "Şuhut"],
  "Ağrı": ["Ağrı Merkez", "Doğubeyazıt", "Patnos", "Tutak", "Eleşkirt", "Hamur", "Sağlık", "Taşlıçay"],
  "Aksaray": ["Ağaçören", "Gülağaç", "Kızılkaya", "Merkez", "Sarıyahşi", "Ortaköy", "Eskil", "Kızılkaya", "Ağaçören"],
  "Amasya": ["Amasya Merkez", "Göynücek", "Hamamözü", "Merzifon", "Suluova", "Taşova", "Zile"],
  "Ankara": ["Altındağ", "Çankaya", "Keçiören", "Mamak", "Sincan", "Yenimahalle", "Gölbaşı", "Pursaklar", "Etimesgut", "Ayaş", "Bala", "Çubuk"],
  "Antalya": ["Akseki", "Alanya", "Demre", "Finike", "Gündoğmuş", "Kemer", "Korkuteli", "Kumluca", "Manavgat", "Serik", "Kepez", "Muratpaşa"],
  "Ardahan": ["Ardahan Merkez", "Çıldır", "Göle", "Hanak", "Posof", "Yusufeli"],
  "Artvin": ["Artvin Merkez", "Arhavi", "Hopa", "Murgul", "Şavşat", "Borçka", "Damal", "Savsat"],
  "Balıkesir": ["Ayvalık", "Balya", "Bandırma", "Bigadiç", "Burhaniye", "Dursunbey", "Edremit", "Erdek", "Gönen", "İvrindi", "Kepsut", "Marmara", "Susurluk"],
  "Bilecik": ["Bilecik Merkez", "İnhisar", "Bozüyük", "Gölpazarı", "Osmaneli", "Pazaryeri", "Söğüt", "Yenipazar"],
  "Bingöl": ["Bingöl Merkez", "Genç", "Karlıova", "Kiğı", "Solhan", "Yedisu"],
  "Bitlis": ["Bitlis Merkez", "Ahlat", "Güroymak", "Hizan", "Mutki", "Tatvan"],
  "Bolu": ["Bolu Merkez", "Gerede", "Göynük", "Kıbrıscık", "Mengen", "Mudurnu", "Seben", "Yeniçağa"],
  "Burdur": ["Burdur Merkez", "Ağlasun", "Bucak", "Çavdır", "Gölhisar", "Kemer", "Tefenni", "Yeşilova"],
  "Bursa": ["Nilüfer", "Osmangazi", "Yıldırım", "Gemlik", "Mudanya", "İnegöl", "Karacabey", "Orhangazi", "Mustafakemalpaşa", "Büyükorhan", "Keles", "Harmancık", "Yenişehir", "Mustafakemalpaşa"],
  "Çanakkale": ["Çanakkale Merkez", "Ayvacık", "Bayramiç", "Biga", "Gelibolu", "Lapseki", "Eceabat", "Ezine", "Kezik", "Yenice"],
  "Çorum": ["Çorum Merkez", "Alaca", "Bayat", "Boğazkale", "Dodurga", "İskilip", "Kargı", "Laçin", "Mecitözü", "Ortaköy", "Osmancık", "Sungurlu", "Uğurludağ"],
  "Denizli": ["Acıpayam", "Babadağ", "Beyağaç", "Bozkurt", "Çal", "Çivril", "Güney", "Honaz", "Kale", "Merkezefendi", "Pamukkale", "Serinhisar", "Tavas"],
  "Diyarbakır": ["Bağlar", "Bismil", "Çınar", "Çüngüş", "Dicle", "Ergani", "Hani", "Hazro", "Kayapınar", "Kulp", "Lice", "Silvan", "Sur", "Yenişehir"],
  "Düzce": ["Düzce Merkez", "Akçakoca", "Bolu", "Gölyaka", "Gümüşova", "Kaynaşlı", "Yığılca"],
  "Edirne": ["Edirne Merkez", "Keşan", "Lalapaşa", "Meriç", "Enez", "Uzunköprü", "Havsa"],
  "Elazığ": ["Elazığ Merkez", "Ağın", "Alacakaya", "Arıcak", "Baskil", "Karakoçan", "Keban", "Kovancılar", "Maden", "Palu", "Sivrice"],
  "Erzincan": ["Erzincan Merkez", "İliç", "Kemaliye", "Refahiye", "Erzincan", "Çayırlı", "Otlukbeli", "Sarkışla", "Ulalar", "Yıldızeli"],
  "Erzurum": ["Erzurum Merkez", "Aziziye", "Aşkale", "Hınıs", "İspir", "Köprüköy", "Narman", "Oltu", "Olur", "Pasinler", "Palandöken", "Şenkaya", "Tekman", "Yakutiye"],
  "Eskişehir": ["Odunpazarı", "Tepebaşı", "Seyitgazi", "Mahmudiye", "Mihalıççık", "Alpu", "Büyükçekmece", "İnönü"],
  "Gaziantep": ["Şahinbey", "Şehitkamil", "Oğuzeli", "Nizip", "Karkamış", "Araban", "Yavuzeli"],
  "Giresun": ["Giresun Merkez", "Alucra", "Bulancak", "Çamoluk", "Dereli", "Espiye", "Eynesil", "Güce", "Keşap", "Piraziz", "Şebinkarahisar", "Tirebolu", "Yağlıdere"],
  "Gümüşhane": ["Gümüşhane Merkez", "Kelkit", "Köse", "Şiran", "Torul"],
  "Hakkari": ["Hakkari Merkez", "Çukurca", "Şemdinli", "Yüksekova"],
  "Hatay": ["Antakya", "Altınözü", "Belen", "Defne", "Dörtyol", "Erzin", "Hassa", "İskenderun", "Kırıkhan", "Reyhanlı", "Samandağ", "Yayladağı"],
  "Iğdır": ["Iğdır Merkez", "Aralık", "Karakoyunlu", "Tuzluca"],
  "Isparta": ["Isparta Merkez", "Aksu", "Eğirdir", "Gelendost", "Göller", "Keçiborlu", "Senirkent", "Sütçüler", "Uluborlu", "Yalvaç"],
  "İstanbul": ["Adalar", "Arnavutköy", "Ataşehir", "Avcılar", "Bağcılar", "Bahçelievler", "Bakırköy", "Başakşehir", "Beykoz", "Beylikdüzü", "Beyoğlu", "Büyükçekmece", "Çatalca", "Çekmeköy", "Esenler", "Esenyurt", "Eyüpsultan", "Gaziosmanpaşa", "Kadıköy", "Kağıthane", "Kartal", "Küçükçekmece", "Maltepe", "Pendik", "Sancaktepe", "Silivri", "Sultanbeyli", "Şile", "Şişli", "Tuzla", "Üsküdar", "Zeytinburnu"],
  "İzmir": ["Aliağa", "Bayındır", "Bergama", "Beydağ", "Bornova", "Buca", "Çiğli", "Gaziemir", "Güzelbahçe", "Karabağlar", "Karaburun", "Karaköy", "Kemalpaşa", "Kınık", "Kiraz", "Konak", "Menderes", "Menemen", "Narlıdere", "Ödemiş", "Seferihisar", "Selçuk", "Tire", "Torbalı", "Urla"],
  "Kahramanmaraş": ["Onikişubat", "Dulkadiroğlu", "Afşin", "Andırın", "Çağlayancerit", "Ekinözü", "Göksun", "Nurhak", "Pazarcık", "Türkoğlu"],
  "Karabük": ["Karabük Merkez", "Eskipazar", "Ovacık", "Safranbolu", "Yenice"],
  "Kırıkkale": ["Kırıkkale Merkez", "Bahşili", "Balışeyh", "Delice", "Karakeçili", "Keskin", "Kızılırmak", "Sulakyurt", "Yahşihan"],
  "Kırklareli": ["Kırklareli Merkez", "Lüleburgaz", "Vize", "Pınarhisar", "Pehlivanköy", "Demirköy", "Kavaklı", "Marmaraereğlisi", "Çorlu", "Malkara", "Babaeski"],
  "Kocaeli": ["Gebze", "İzmit", "Kartepe", "Derince", "Dilovası", "Çayırova", "Başiskele", "Kocaeli Merkez", "Kandıra", "Gölcük", "Karamürsel", "Derince", "Başiskele", "Çayırova"],
  "Konya": ["Meram", "Selçuklu", "Karatay", "Akşehir", "Beyşehir", "Ereğli", "Ilgın", "Seydişehir", "Kulu", "Hadim", "Taşkent", "Yunak", "Halkapınar", "Bozkır", "Çumra", "Cihanbeyli", "Kızılkaya"],
  "Kütahya": ["Kütahya Merkez", "Altıntaş", "Aslanapa", "Çavdarhisar", "Domaniç", "Dumlupınar", "Emet", "Gediz", "Hisarcık", "İscehisar", "Kızılca", "Pazarlar", "Simav", "Tavşanlı"],
  "Malatya": ["Battalgazi", "Yeşilyurt", "Arapgir", "Arguvan", "Doğanyol", "Hekimhan", "Kale", "Kuşsuz", "Pütürge", "Sarımsaklı", "Yazıhan"],
  "Manisa": ["Akhisar", "Demirci", "Kula", "Salihli", "Soma", "Turgutlu", "Gölmarmara", "Saruhanlı", "Ahmetli", "Kırkağaç", "Şehzadeler", "Yunusemre"],
  "Mardin": ["Artuklu", "Kızıltepe", "Midyat", "Nusaybin", "Derik", "Dargeçit", "Mazıdağı", "Ömerli", "Savur", "Yeşilli"],
  "Mersin": ["Akdeniz", "Mezitli", "Tarsus", "Erdemli", "Silifke", "Anamur", "Mut", "Çamlıyayla", "Büyükeceli", "Bozyazı", "Toroslar", "Yenişehir"],
  "Muğla": ["Menteşe", "Bodrum", "Fethiye", "Dalaman", "Datça", "Köyceğiz", "Marmaris", "Ortaca", "Seydikemer", "Ula"],
  "Nevşehir": ["Avanos", "Derinkuyu", "Gülşehir", "Hacıbektaş", "Kozaklı", "Nevşehir Merkez", "Acıgöl", "Avanos", "Ürgüp", "Kızılkaya"],
  "Niğde": ["Niğde Merkez", "Altunhisar", "Bor", "Çiftlik", "Ulukışla"],
  "Ordu": ["Altınordu", "Fatsa", "Ünye", "Perşembe", "Korgan", "Kumru", "Mesudiye", "Gölköy", "Çamaş", "Çatalpınar", "Aybastı", "Gülyalı"],
  "Osmaniye": ["Osmaniye Merkez", "Bahçe", "Düziçi", "Kadirli", "Sumbas", "Toprakkale"],
  "Rize": ["Rize Merkez", "Ardeşen", "Çamlıhemşin", "Çayeli", "Derepazarı", "Fındıklı", "Güneysu", "Hayrat", "İyidere", "Kalkandere", "Pazar"],
  "Sakarya": ["Adapazarı", "Akyazı", "Erenler", "Ferizli", "Geyve", "Hendek", "Karasu", "Kaynarca", "Kocaali", "Pamukova", "Sapanca", "Serdivan"],
  "Samsun": ["Atakum", "Canik", "İlkadım", "Bafra", "Çarşamba", "Vezirköprü", "Ladik", "Asarcık", "Ayvacık", "Salıpazarı", "Tekkeköy", "Terme", "Yakakent"],
  "Siirt": ["Siirt Merkez", "Baykan", "Eruh", "Pervari", "Şirvan", "Tillo"],
  "Sinop": ["Sinop Merkez", "Ayancık", "Dikmen", "Erfelek", "Gerze", "Saraydüzü", "Türkeli", "Boyabat"],
  "Sivas": ["Sivas Merkez", "Akıncılar", "Divriği", "Gemerek", "Gölova", "Hafik", "İmranlı", "Kangal", "Koyulhisar", "Sızır", "Şarkışla", "Zara"],
  "Şanlıurfa": ["Şanlıurfa Merkez", "Akçakale", "Birecik", "Bozova", "Ceylanpınar", "Eyyübiye", "Haliliye", "Harran", "Karaköprü", "Siverek", "Viranşehir"],
  "Tekirdağ": ["Çerkezköy", "Çorlu", "Ergene", "Hayrabolu", "Malkara", "Marmara Ereğlisi", "Süleymanpaşa", "Kapaklı", "Şarköy"],
  "Tokat": ["Tokat Merkez", "Almus", "Artova", "Başçiftlik", "Erbaa", "Niksar", "Reşadiye", "Sungurlu", "Sulusaray", "Zile"],
  "Trabzon": ["Akçaabat", "Araklı", "Arsin", "Beşikdüzü", "Çarşıbaşı", "Dernekpazarı", "Hayrat", "Köprübaşı", "Maçka", "Of", "Ortahisar", "Sürmene", "Şalpazarı", "Yomra"],
  "Tunceli": ["Tunceli Merkez", "Çemişgezek", "Hozat", "Mazgirt", "Nazımiye", "Ovacık", "Pertek", "Pülümür"],
  "Uşak": ["Uşak Merkez", "Banaz", "Eşme", "Karahallı", "Sivaslı", "Ulubey"],
  "Van": ["İpekyolu", "Edremit", "Özalp", "Gevaş", "Bahçesaray", "Erciş", "Muradiye", "Çaldıran", "Çatak", "Tusba", "Kavaklı"],
  "Yalova": ["Altınova", "Armutlu", "Çınarçık", "Devlet Sahil Yolu", "Termal", "Yalova Merkez"],
  "Yozgat": ["Yozgat Merkez", "Akdağmadeni", "Boğazlıyan", "Çayıralan", "Kadışehri", "Sarıkaya", "Sorgun", "Şefaatli", "Yerköy"],
  "Zonguldak": ["Zonguldak Merkez", "Alaplı", "Çaycuma", "Devrek", "Ereğli", "Gökçebey", "Kilimli", "Kozlu"]
};


// İl seçeneklerini doldur
const illerSelect = document.getElementById('iller');
for (const il in illerIlceler) {
  const option = document.createElement('option');
  option.value = il;
  option.textContent = il;
  illerSelect.appendChild(option);
}

// İl seçildiğinde ilçeleri güncelle
illerSelect.addEventListener('change', function() {
  const secilenIl = illerSelect.value;
  const ilcelerSelect = document.getElementById('ilceler');
  ilcelerSelect.innerHTML = '<option value="">Önce bir il seçiniz</option>'; // Önceki ilçeleri temizle

  if (secilenIl) {
    const ilceler = illerIlceler[secilenIl];
    ilceler.forEach(function(ilce) {
      const option = document.createElement('option');
      option.value = ilce;
      option.textContent = ilce;
      ilcelerSelect.appendChild(option);
    });
    ilcelerSelect.disabled = false;
  } else {
    ilcelerSelect.disabled = true;
  }
});
