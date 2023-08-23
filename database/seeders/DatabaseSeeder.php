<?php

namespace Database\Seeders;

use App\Models\Author;
use App\Models\Book;
use App\Models\BookBind;
use App\Models\Category;
use App\Models\Format;
use App\Models\Genre;
use App\Models\Language;
use App\Models\Publisher;
use App\Models\Role;
use App\Models\Script;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->create([
            'username' => 'server',
            'name' => 'Server',
            'surname' => ' ',
            'jmbg' => '0000000000000',
            'role_id' => Role::librarian()->id,
            'password' => '@password@'
        ]);

        User::factory()->create([
            'username' => 'bibliotekar',
            'role_id' => Role::librarian()->id,
            'password' => 'password'
        ]);

        User::factory()->create([
            'username' => 'admin-123',
            'role_id' => Role::admin()->id,
            'password' => 'password'
        ]);

        User::factory()->create([
            'username' => 'ucenik-123',
            'role_id' => Role::student()->id,
            'password' => 'password'
        ]);

        DB::statement("INSERT INTO `categories` VALUES (1,'Lektire','2022_09_29_23_25_29_1664483827382','Lektira je pojam koji se odnosi i na samo gradivo, materijal koji se čita, kao i na proces čitanja. Lektira kao proces čitanja može se odnositi na bilo koju vrstu pisanog teksta. Konkretno termin ,kao proces čitanja, se odnosi na klasične štampane medije kao što su knjige i novine. Lektira u drugom smislu, kao materijal koji se čita, odnosi se na školsko gradivo, knjige ili gradivo koje se treba pročitati uopšte ili za izvjesno vrijeme, u jednoj školskoj godini.','2022-09-29 23:25:29','2022-09-29 23:25:29'),(2,'Udžbenici',NULL,'Udžbenik je knjiga u kojoj se date definicije, zadaci i u kojem je objašnjeno školsko gradivo. Uz njega obično ide i radna sveska sa zadacima iz prakse\r\n.','2022-09-29 23:27:42','2022-09-29 23:27:42'),(3,'Roman','2022_09_30_00_30_59_1664490656868','Roman je dugačak pripovedni tekst napisan u prozi. Prema podeli na književne rodove, roman spada u epiku, tačnije ubraja se kao književna vrsta u epskoj poeziji u prozi. Formalne osobenosti romana je teško precizno definisati, ali je u načelu u pitanju složena, obimnija narativna forma, kako u pogledu količine teksta, tako i u pogledu opsega zbivanja koje opisuje.\r\nOvaj žanr je bio opisan kao forma koja ima „kontinuiranu i sveobuhvatnu istoriju od oko dve hiljade godina“,koja vodi poreklo iz klasične Grčke i Rima, iz srednjovekovne i rane moderne romantike, i iz tradicije novela. Kasnije je jedna italijanska reč korištena za pripovetku da bi pravila razlika od romana. Takva tendencija je prisutna u engleskom jeziku od 18. veka. Ijan Vat je u svom radu The Rise of the Novel predložio 1957. godine da je roman prvi put nastao početkom 18. veka. „Roman kao književna forma nastaje i razvija se u skladu sa razvojem i dinamikom kapitalizma. U ovoj pojednostavljenoj slici, roman kao forma književnog izražavanja predstavlja literarno iskazani liberalni kapitalizma čija je glavna odlika naglašeni individualizam.','2022-09-30 00:30:59','2022-09-30 00:30:59'),(4,'Drama','2022_09_30_00_36_13_1664490836027','drama • ženski rod; Radnja; poet. pesnička vrsta koja prikazuje događaje iz ljudskog života kao da se u sadašnjosti i pred našim očima zbivaju: lica koja učestvuju govore i rade, svako prema svom karakteru; pritom uvek mora da postoji borba dveju suprotnosti - konflikt, sukob, a naročito jedinstvo dramske ideje. Pošto se, u ekspoziciji, prikažu razlozi konflikta i čvor zapetlja, razvitak radnje dostiže u peripetiji svoj vrhunac, posle čega u katastrofi dolazi rešenje konflikta. Drama je podeljena na činove (ili 5), a činovi na pojave ili scene. Vrste: žalosna igra ili tragedija, komedija (sa šalom i pozom) i pozorišna igra, tj. drama u užem smislu; fig. događaj ili doživljaj koji je po svojoj uzbudljivosti sličan drami.\r\nDramatičan tok događaja..','2022-09-30 00:36:13','2022-09-30 00:36:13'),(5,'Zbirke pjesama','2022_09_30_00_43_02_1664491380098',NULL,'2022-09-30 00:43:02','2022-09-30 00:43:02');");
        DB::statement("INSERT INTO `genres` VALUES (2,'Autobiografija','2022_09_29_23_16_22_1664483281809','2022-09-29 23:12:49','2022-09-29 23:16:22'),(3,'Enciklopedija',NULL,'2022-09-29 23:17:34','2022-09-29 23:17:34'),(4,'Ljubavni roman',NULL,'2022-09-29 23:17:52','2022-09-30 00:07:34'),(5,'Kriminalistički roman',NULL,'2022-09-29 23:18:01','2022-09-30 00:06:53'),(6,'Putopis',NULL,'2022-09-29 23:18:06','2022-09-29 23:18:06'),(8,'Fantazija',NULL,'2022-09-29 23:18:18','2022-09-29 23:18:18'),(9,'Poezija',NULL,'2022-09-29 23:18:43','2022-09-29 23:18:43'),(10,'Avanturistički roman',NULL,'2022-09-29 23:19:30','2022-09-30 00:05:56'),(11,'Klasik',NULL,'2022-09-29 23:19:48','2022-09-30 00:26:25'),(12,'Dječija književnost',NULL,'2022-09-29 23:20:52','2022-09-29 23:20:52'),(13,'Istorijski roman',NULL,'2022-09-29 23:21:12','2022-09-30 00:06:15'),(14,'Horor',NULL,'2022-09-29 23:27:56','2022-09-29 23:27:56'),(15,'Fikcija',NULL,'2022-09-30 00:22:55','2022-09-30 00:22:55'),(16,'Tragedija','2022_09_30_00_35_00_1664489831062','2022-09-30 00:35:00','2022-09-30 00:35:00'),(17,'Komedija','2022_09_30_00_37_17_1664489969517','2022-09-30 00:37:17','2022-09-30 00:37:17'),(18,'Tragikomedija','2022_09_30_00_44_13_1664490384278','2022-09-30 00:44:13','2022-09-30 00:44:13');");
        DB::statement("INSERT INTO `publishers` VALUES (1,'Laguna','2022-09-29 22:59:27','2022-09-29 22:59:27'),(2,'Ouroboros','2022-09-29 23:00:27','2022-09-29 23:00:27'),(3,'Cid','2022-09-29 23:00:37','2022-09-29 23:01:45'),(4,'Arto','2022-09-29 23:00:49','2022-09-29 23:01:31'),(5,'Nova knjiga','2022-09-29 23:03:43','2022-09-29 23:03:43'),(6,'Sigma','2022-09-29 23:03:59','2022-09-29 23:03:59'),(7,'Balbelo','2022-09-29 23:06:15','2022-09-29 23:06:15'),(8,'Cosmo','2022-09-29 23:07:23','2022-09-29 23:09:36');");
        DB::statement("INSERT INTO `bookbinds` VALUES (1,'Tvrdi','2022-09-29 22:54:20','2022-09-29 22:54:20'),(3,'Meki','2022-09-29 22:56:37','2022-09-29 22:56:37'),(4,'Kožni','2022-09-29 22:56:49','2022-09-29 22:56:49'),(5,'Poluplatneni','2022-09-29 22:59:07','2022-09-29 22:59:07');");
        DB::statement("INSERT INTO `formats` VALUES (1,'A6','2022-09-29 22:52:15','2022-09-29 22:52:15'),(2,'A5','2022-09-29 22:52:21','2022-09-29 22:52:21'),(3,'A4','2022-09-29 22:52:27','2022-09-29 22:52:27'),(4,'B6','2022-09-29 22:52:38','2022-09-29 22:52:38'),(5,'B5','2022-09-29 22:52:42','2022-09-29 22:52:42'),(6,'B4','2022-09-29 22:52:47','2022-09-29 22:52:47'),(7,'A3','2022-09-29 22:53:34','2022-09-29 22:53:34');");
        DB::statement("INSERT INTO `languages` VALUES (1,'Srpski','2022-09-29 22:45:35','2022-09-29 22:45:35'),(2,'Crnogorski','2022-09-29 22:45:49','2022-09-29 22:45:49'),(3,'Hrvatski','2022-09-29 22:46:01','2022-09-29 22:46:01'),(4,'Bosanski','2022-09-29 22:46:10','2022-09-29 22:46:10'),(5,'Engleski','2022-09-29 22:46:16','2022-09-29 22:46:16'),(6,'Njemački','2022-09-29 22:46:22','2022-09-29 22:46:22'),(7,'Francuski','2022-09-29 22:46:28','2022-09-29 22:46:28'),(8,'Ruski','2022-09-29 22:46:35','2022-09-29 22:46:49'),(9,'Latinski','2022-09-29 22:47:47','2022-09-29 22:47:47'),(10,'Italijanski','2022-09-29 22:48:19','2022-09-29 22:48:19');");
        DB::statement("INSERT INTO `authors` VALUES (1,'Ivo','Andrić','<p>Ivo Andrić (Dolac, kod Travnika, 9. oktobar 1892 &mdash; Beograd, 13. mart 1975) bio je srpski i jugoslovenski književnik i diplomata Kraljevine Jugoslavije.</p>\r\n\r\n<p>Godine 1961.(10. decembra) dobio je Nobelovu nagradu za književnost &bdquo;za epsku snagu kojom je oblikovao teme i prikazao sudbine ljudi tokom istorije svoje zemlje&rdquo;. Kao gimnazijalac, Andrić je bio pripadnik naprednog revolucionarnog pokreta protiv Austrougarske vlasti Mlada Bosna i strastveni borac za oslobođenje južnoslovenskih naroda od Austrougarske monarhije. U austrijskom Gracu je diplomirao i doktorirao, a vreme između dva svetska rata proveo je u službi u konzulatima i poslanstvima Kraljevine Jugoslavije u Rimu, Bukure&scaron;tu, Gracu, Parizu, Madridu, Briselu, Ženevi i Berlinu. Bio je član Srpske akademije nauka i umetnosti u koju je primljen 1926. godine. Njegova najpoznatija dela su pored romana Na Drini ćuprija i Travnička hronika, Prokleta avlija, Gospođica i Jelena, žena koje nema. U svojim delima se uglavnom bavio opisivanjem života u Bosni za vreme osmanske vlasti.</p>','2022_09_29_23_31_23_1664484179574','2022-09-29 23:31:23','2022-09-29 23:31:23'),(2,'Mehmed Meša','Selimović','<p>Mehmed Selimović (Tuzla, 26. aprila 1910. &ndash; Beograd, 11. jula 1982.), je jugoslavenski pisac. U rodnom gradu zavr&scaron;io je osnovnu &scaron;kolu i gimnaziju. 1930. godine upisao se na studijsku grupu srpskohrvatski jezik i jugoslovenska knjizevnost Filozofskog fakulteta u Beogradu. Diplomirao je 1934. godine, a od 1935. do 1941. godine radi kao profesor Građanske &scaron;kole, a potom je (1936) postavljen za suplenta u Realnoj gimnaziji u Tuzli.</p>','2022_09_29_23_33_30_1664484309787','2022-09-29 23:33:30','2022-10-03 20:33:55'),(3,'Franz','Kafka','<p>Franc Kafka rođen je 3. jula 1883. u Pragu a umro 3. juna 1924. u Beču. Spada u red najznačajnijih i najuticajnijih pisaca dvadesetog veka. Presudni uticaj na recepciju Kafkinih dela imao je Maks Brod, Kafkin intimni prijatelj koji se oglu&scaron;io o Kafkinu testamentarnu volju i objavio njegova dela. Za života je Franc Kafka ostao poznat samo užem krugu čitalaca. Istina, krugu kome su pripadali Tomas Man, Herman Hese, Alfred Deblin, Rajner Marija Rilke, Robert Muzil, Kurt Tuholski... Odmah po zavr&scaron;etku Drugog svetskog rata Kafkina dela su preko Amerike vraćena u Nemačku, gde su prihvaćena kao ravnopravna sa delima Tomasa Mana ili Bertolda Brehta. Kafkina poularnost u tim godinama bila je veoma velika.</p>\r\n\r\n<p>Kafka je imao nekoliko ljubavnih veza u životu, dva raskinute veridbe, ali se nikada nije oženio. 1920. godine upoznao je Milenu Jesensku, koja je prevela neka od njegovih dela na če&scaron;ki, i postao blizak sa njom. Sa Dorom Diamant se upoznao 1923. i to je bila njegova poslednaj ljubav. Dora je između 1923-1924. na Kafkin zahtev spalila jedan deo njegovih spisa.</p>\r\n\r\n<p>Za Kafkinog života objavljene su samo neke njegove pripovetke: &bdquo;Presuda&ldquo;, &bdquo;Preobražaj&ldquo;, &bdquo;U kažnjeničkoj koloniji&ldquo;, &bdquo;Seoski lekar&ldquo; i &bdquo;Umetnik u gladovanju&ldquo;. Tek posthumno su objavljeni romani &bdquo;Proces&ldquo;, &bdquo;Zamak&ldquo; i &bdquo;Amerika&ldquo;.</p>','2022_09_29_23_35_29_1664480812385','2022-09-29 23:35:29','2022-09-29 23:35:29'),(4,'Albert','Kami','<p>Albert Kami&nbsp;(1913.-1960.) nobelovac i veliki francuski pisac, rođen je u porodici siroma&scaron;nog zemljoradnika u Alžiru.&nbsp;Otac je, ubrzo po dječakovom rođenju, poginuo u čuvenoj bici na Marni u Prvom svjetskom ratu.&nbsp;Kamijevo &scaron;kolovanje i kasnije studije na Filozofskom fakultetu u Alžiru protekli su u svakodnevnoj borbi za opstanak. Kao student je morao sam da zarađuje te udara pečate na vozačke dozvole u alžirskoj prefekturi, prodaje automobilske djelove i bilježi barometarski pritisak u meteorolo&scaron;koj stanici. Kami zatim radi u alžirskoj radio-stanici, interesuje se za pozori&scaron;nu umjetnost, a jedno vrijeme radi i sa vlastitom pozori&scaron;nom trupom. Do sedamnaeste godine, kada mu je dijagnostikovana tuberkuloza, aktivno se bavio fudbalom igrajući na poziciji golmana.</p>\r\n\r\n<p>Sport i nauku je zavolio pod uticajem nastavnika u osnovnoj &scaron;koli. Zahvalnost mu je odao i tokom inauguaracionog govora pri dodjeli Nobelove nagrade 1957.</p>\r\n\r\n<p>Njegova najpoznatija djela su : &quot;Stranac&quot; i &quot;Mit o Sizifu&quot;</p>','2022_09_29_23_38_23_1664481003791','2022-09-29 23:38:23','2022-10-03 20:34:25'),(5,'Vilijam','Šekspir','<p>Vilijam &Scaron;ekspir je bio engleski pjesnik, dramski pisac i glumac, kojeg smatraju najvećim piscem na engleskom jeziku i najvećim dramskim piscem svih vremena. Napisao je ukupno 38 pozori&scaron;nih drama i 154 soneta. Iako se malo zna o njegovom životu, njegova dela kao &scaron;to su&nbsp;&bdquo;Hamlet&rdquo;, &bdquo;Romeo i Julija&rdquo;, &bdquo;Kralj Lir&rdquo;,&nbsp;imaju veoma veliki uticaj na književnost i pozori&scaron;te već vi&scaron;e od 400 godina.</p>','2022_09_29_23_39_08_1664487504118','2022-09-29 23:39:08','2022-10-03 20:58:59'),(6,'Grozdana','Olujić','<p>\r\nGrozdana Olujić(Erdevik, 30. avgust 1934 &mdash; Beograd, 16. mart 2019) je bila srpska književnica, esejista, prevodilac i antologičar. Imanje Grozdane Olujić nalazi se u Adligatu. &nbsp;Kao romanopisac objavila je &scaron;est romana: Izlet u nebo (1957), Glasam za ljubav (1962), Nemoj biti uspavan pas (1964), Divlje sjeme (1967), Glasovi na vjetru (2009) i Preživjeti Do sutra (2017.) [1] Sakupljene romane u &scaron;est knjiga objavili su 2018. godine Srpska književna zadruga i Partenon. Takođe, kao bajkopisac, objavila je veliki broj bajki i zbirki bajki. Među njima se posebno ističe 10 zbirki: Biserna ruža i druge bajke (1979), Nebeska rijeka i druge bajke (1984), Dječak i princeza (1990), Princ od oblaka (1990)...\r\n\r\nDobitnica je brojnih književnih nagrada i priznanja, domaćih i stranih &mdash; Povelje za životno delo Udruženja književnika Srbije (2004), NIN-ove nagrade za najbolji roman (2009), Politikinog zabavnika (1980), Mlado pokolenje nagrada (1980.) i 1984.), tri nagrade Zmajevih dječijih igara...\r\n</p>\r\n\r\n<p>Njena djela doživjela su brojna izdanja u zemlji, a prevedena su na čak 36 svjetskih jezika.</p>','2022_09_29_23_45_12_1664481055229','2022-09-29 23:45:12','2022-09-30 00:30:21'),(7,'Mihail','Bulgakov','<p>Mihail Bulgakov rođen je 3. (15) maja 1891, u Kijevu, od oca Afanasija Ivanoviča Bulgakova (1859&ndash;1907), profesora Kijevske duhovne akademije, i majke Varvare Mihajlovne (1869&ndash;1922). Bio je prvo dete u porodici, uslediće jo&scaron; &scaron;estoro. Godine 1909. zavr&scaron;ava Prvu kijevsku gimnaziju i upisuje se na Medicinski fakultet Kijevskog univerziteta.<br />\r\nGodine 1939. pisac radi na libretu&nbsp;<em>Ra&scaron;el</em>, kao i na drami o Staljinu (<em>Batumi</em>). Dramu je odobrio s&acirc;m Staljin, ali, uprkos očekivanjima autora, bila je zabranjena i za &scaron;tampu i za izvođenje. U aprilu i maju pisac čita prijateljima roman&nbsp;<em>Majstor i Margarita</em>&nbsp;u celosti. U septembru mu se zdravlje dramatično pogor&scaron;ava, gubi vid, lekari konstatuju hipertoničnu nefrosklerozu, čije znake je i sam već prepoznavao. Počinje da diktira supruzi Jeleni poslednje izmene za roman&nbsp;<em>Majstor i Margarita</em>.</p>','2022_09_29_23_48_12_1664487988305','2022-09-29 23:48:12','2022-09-29 23:48:12'),(8,'Fjodor','Dostojevski','<p>On je jedan od najuticajnijih pisaca ruske književnosti. Prema &scaron;irini i značaju uticaja, posebno u modernizmu, on je bio svetski pisac u rangu &Scaron;ekspira i Servantesa. Realizam Dostojevskog predstavlja svojevrsni prelaz prema modernizmu, jer njegovo stvaranje upravo u epohi modernizma postaje nekom vrstom uzora načina pisanja. Sa aspekta književne tehnike njegovi su romani jo&scaron; uvek bliski realizmu zbog obuhvata celine, načina karakterizacije i dominirajuće naracije, dok dramatični dijalozi, filozofske rasprave i polifonija čine od njega preteču modernizma. Utemeljitelj je psiholo&scaron;kog romana.[1] Po mnogima je i preteča egzistencijalizma.</p>','2022_09_29_23_55_19_1664488204836','2022-09-29 23:55:19','2022-09-29 23:56:46'),(9,'Petar II','Petrović Njegoš','<p>Petar II Petrović Njego&scaron;, za života poznat kao vladika Rade (po rođenju Rade Tomov Petrović;13 novembra.1813 - 10. oktobar, 1851) je bio pjesnik, episkop i vladika Crne Gore.</p>\r\n\r\n<p>Njego&scaron; je udario temelje moderne crnogorske države uspostavljanjem organa vlasti: Senata, Gvardije i Perjanika i uvođenjem plaćanja poreza. Objedinio je svetovnu i versku vlast proterivanjem guvernadura Radonjića iz zemlje, čime je ukinuta tradicionalna podela vlasti između guvernera koji se oslanjao na Zapad i episkopa koji se oslanjao na Rusiju.</p>\r\n\r\n<p>Njegovo najuticajnije pjesničko djelo je Gorski vijenac, objavljeno 1847. godine.</p>\r\n\r\n<p>Dvije zbirke pjesama su publikovane 1834. Godine, među pjesmama u kojima preovlađuje dubok i smio misaoni lirizam naročito se ističu:&nbsp;<strong><em>Crnogorac k svemogućem Bogu</em></strong>,&nbsp;<strong><em>Vjerni sin noći pjeva</em></strong><em> <strong>pohvalu mislima</strong></em><strong>,&nbsp;<em>Oda suncu</em></strong>&nbsp;i druge. Ostale pesme pjevaju suvremena juna&scaron;tva crnogorska, i ispjevane su sasvim u duhu narodne pesme. Kasnije je &scaron;tampao i dva kraća spjeva u istom duhu:&nbsp;<strong><em>Kula Vuri&scaron;ića</em></strong>&nbsp;i&nbsp;<strong><em>Čardak Aleksića</em></strong>.</p>\r\n\r\n<p><strong>Slobodijada </strong>epski spjev u deset pjevanja objavljen je 1854.godine, u kome slavi crnogorske pobjede nad&nbsp;Turcima&nbsp;i&nbsp;Francuzima.Njego&scaron; je radio i na prikupljanju narodnih pjesama i izdao ih u zbirci&nbsp;<strong>Ogledalo srpsko</strong>. Po suvremenim listovima i časopisima izi&scaron;ao je znatan broj njegovih kraćih pjesama, prigodnog i moralnog karaktera, kao i veliki broj oda i poslanica.</p>\r\n\r\n<p>Njego&scaron; vremenom sve vi&scaron;e razvija svoj stil te poslednjih sedam godina života daje tri svoja glavna djela:</p>\r\n\r\n<ul>\r\n	<li><em><strong>Luča Mikrokozma&nbsp;&nbsp;</strong></em>(<strong>1845</strong>)&nbsp;</li>\r\n	<li><em><strong>Gorski vijenac</strong></em>&nbsp;(<strong>1847</strong>)</li>\r\n	<li><em><strong>Lažni car &Scaron;ćepan Mali</strong></em>&nbsp;(<strong>1851</strong>)</li>\r\n</ul>','2022_10_03_21_06_39_1664823992553','2022-09-29 23:59:10','2022-10-03 21:06:39'),(10,'Onore','de Balzak','<p>Onore de Balzak (franc. Honor&eacute; de Balzac; Tur, 20. maj 1799 &mdash; Pariz, 18. avgust 1850) bio je francuski romanopisac koji se smatra ključnim autorom realizma.</p>\r\n\r\n<p>Onore de Balzak je sin malograđanskih roditelja. Otac, Bernar Fransoa, rođen u Tarnu, regionu južne Francuske, bio je čuven po svojoj originalnosti. Majka mu je Parižanka, iz porodice koja je držala trgovinu gajtana i čoje. Imala je osamnaest godina kada se udala za supruga koji je imao pedeset godina. Svom prezimenu je dodao plemićko de 1830. godine. Od tada se potpisivao kao Onore de Balzak.</p>','2022_09_30_00_03_27_1664488952017','2022-09-30 00:03:27','2022-09-30 00:03:27'),(11,'Lav','Tolstoj','<p>Lav Nikolajevič Tolstoj &nbsp;je bio ruski književnik, grof i filozof. Rođen je 9. septembra 1828. godine u Jasnoj Poljani, a preminuo 20. novembra 1910. godine u Astapovu.</p>\r\n\r\n<p>Najpoznatiji je po romanima: &bdquo;Rat i mir&ldquo; &nbsp;&nbsp;i &bdquo;Ana Karenjina&ldquo; &nbsp;smatra &nbsp;se jednim od najvažnijih ruskih realista. Osim toga, Tolstoj je bio književni kritičar, filozof, levičar i pacifista. Progla&scaron;en je za najboljeg pisca u poslednjih 200 godina. Prvi veći uspeh doživeo je objavljivanjem polu-autobiografske trilogije &bdquo;Detinjstvo, Deča&scaron;tvo i Mladost&ldquo; , te zbirkom pripovedaka pod nazivom &bdquo;Sevastopljske priče&ldquo;&nbsp; u kojima je opisao svoja iskustva iz Krimskog rata.</p>','2022_09_30_00_05_34_1664482340363','2022-09-30 00:05:34','2022-09-30 00:05:34'),(12,'Branislav','Nušić','<p>Komediograf, pripovjedač, romanopisac, novinar i diplomata <strong>Branislav Nu&scaron;ić</strong> rođen je u Beogradu 20. oktobra 1864. godine u cincarskoj porodici kao Alkibijad Nu&scaron;a. Djetinjstvo je proveo u Smederevu gde je zavr&scaron;io osnovnu &scaron;kolu i prve dvije godine gimnazije. Maturirao je u Beogradu, započeo studije prava u Gracu i diplomirao na beogradskoj Velikoj &scaron;koli. Postav&scaron;i punoljetan zvanično je promijenio ime u Branislav Nu&scaron;ić. U devetnaestoj godini napisao je svoju prvu komediju<strong>&nbsp;<em>Narodni poslanik</em></strong>&nbsp;koja će zbog političke nepodobnosti biti postavljena na scenu trinaest godina kasnije. Sličnu sudbinu imala je i njegova druga komedija&nbsp;<strong><em>Sumnjivo lice&nbsp;</em></strong>koja će na izviđenje čekati vi&scaron;e od tri decenije.</p>','2022_10_03_18_43_54_1664812894109','2022-10-03 18:43:54','2022-10-03 18:43:54'),(13,'Miloš','Crnjanski','<p>Milo&scaron; Crnjanski &nbsp;(Crnograd, 26. oktobar 1893 &mdash; 30. novembar 1977, Beograd) &nbsp;je srpski književnik i jugoslovenski diplomata, poznat kao jedan od najvećih ekspresionističkih pjesnika 20. vijeka. U srpskoj književnosti 20. vijeka, Milo&scaron; Crnjanski je jedan od najznačajnijih stvaralaca. U svom radu postigao je brojne uspjehe. Od njegovih početaka kao novinara sa socijalno-političkim stavovima, postao je pjesnik i romantičar, koji je svojim radom stvorio prekretnicu u srpskoj književnoj istoriji.&nbsp;</p>\r\n\r\n<p>&nbsp;</p>','2022_10_03_21_07_36_1664823874984','2022-10-03 21:07:36','2022-10-03 21:07:56'),(14,'Džordž','Orvel','<p>Džordž Orvel (pravo ime Erik Artur Bler; Motihari) (25. jun 1903 &ndash; London, 21. januar 1950) bio je engleski književnik. Stekao je slavu romanima, među kojima se posebno ističu &bdquo;Životinjska farma&ldquo; i &bdquo;1984&ldquo;, kritikama, političkim i književnim radovima. Orvel se smatra jednim od najpoznatijih engleskih esejista 20. vijeka.</p>','2022_10_03_21_23_55_1664824982962','2022-10-03 21:23:56','2022-10-03 21:26:05'),(15,'Test','Test','<p>test</p>','2022_10_05_15_31_42_1664976699385','2022-10-05 15:31:42','2022-10-05 15:34:28');");

//         User::factory(10)->create([
//             'role_id' => Role::student()->id,
//         ]);
//
//         $book = Book::factory(3)
//             ->has(Category::factory()->count(3))
//             ->has(Genre::factory()->count(3))
//             ->has(Author::factory()->count(3))
//            ->create();
        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

//        BookBind::factory(10)->create();
//        Category::factory(10)->create();
//        Format::factory(10)->create();
//        Genre::factory(10)->create();
//        Publisher::factory(10)->create();
//        Script::factory(10)->create();
//        Language::factory(10)->create();

//        Author::factory(10)->create();
    }
}
