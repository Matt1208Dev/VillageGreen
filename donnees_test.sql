-- Identification de la base de donnée --

USE village_green;

-- Table commercials --

INSERT INTO `commercials` (`com_lastname`,`com_firstname`,`com_type`) VALUES ("Wyatt","Sean","Professionnel"),("Fischer","Lynn","Professionnel"),("Bush","Blair","Professionnel"),("Stephenson","Allen","Professionnel"),("Wilkinson","Sheila","Particulier");

-- Table categories --

INSERT INTO `categories` (`cat_name`, `cat_parent_id`) VALUES ("Guitares", NULL),("Basses", NULL),("Batteries", NULL),("Claviers", NULL),("Studio", NULL),("Sono", NULL),("Accessoires", NULL),("Guitares Electriques","1"),("Guitares Classiques","1"),("Guitares Acoustiques & Electro-acoustiques","1"),("Guitare Gauchers","1"),("Basses Electriques","2"),("Basses Acoustiques","2"),("Basses Semi-acoustiques","2"),("Ukulélés","1"),("Autres instruments à cordes pincées", NULL),("Accessoires Guitares/Basses","7"),("Batteries Acoustiques","3"),("Batteries Electroniques","3"),("Accessoires Batteries","7"); 

-- Table customers --

INSERT INTO `customers` (`cus_lastname`,`cus_firstname`,`cus_sex`,`cus_bil_address`,`cus_bil_postalcode`,`cus_bil_city`,`cus_del_address`,`cus_del_postalcode`,`cus_del_city`,`cus_phone`,`cus_mail`,`cus_type`,`cus_coef`,`cus_rep_id`) VALUES ("Julien","Jade","1","P.O. Box 589, 2728 Faucibus Road","57322","Opprebais","Ap #291-7296 Neque Rd.","74630","Tumbler Ridge","0154918534","mauris@eutelluseu.edu","Particulier","40","5"),("Fernandez","Syrine","1","Ap #722-1789 Consequat Rd.","02899","Maria","480 Convallis Street","76111","Worcester","0575453461","Phasellus.fermentum@Maurismagna.edu","Particulier","40","5"),("Noel","Emma","1","2365 Erat Av.","32559","Steenokkerzeel","Ap #179-4965 Commodo Avenue","62043","Colledimacine","0698962896","velit.Cras.lorem@estvitaesodales.co.uk","Particulier","40","5"),("Barbier","Éléna","1","567-4288 Nonummy Av.","92179","Nederhasselt","334-7788 Habitant Rd.","63072","Sasaram","0840271109","aliquet.libero@sociisnatoque.com","Particulier","40","5"),("Renault","Marine","1","P.O. Box 417, 1528 Justo Av.","10516","Nemoli","Ap #904-1818 Adipiscing Street","28089","Linares","0340916457","Sed@NullaaliquetProin.co.uk","Particulier","40","5"),("Albert","Clara","1","427-9890 Risus. Av.","60795","Toltén","543-6128 Fermentum Avenue","53414","Walhain-Saint-Paul","0127821122","diam.Pellentesque.habitant@cursus.org","Particulier","40","5"),("Gillet","Alexia","1","P.O. Box 733, 3384 Vitae Av.","71923","Devon","8572 Nibh. St.","28141","Puri","0811766516","Donec@eratneque.edu","Particulier","40","5"),("Morin","Solene","1","P.O. Box 123, 3946 Odio Street","29823","Portree","P.O. Box 463, 8746 Eleifend, Street","91305","San Massimo","0803167652","nibh.vulputate.mauris@egestas.com","Particulier","40","5"),("Vidal","Manon","1","600-9668 Nulla. Street","29479","Vorselaar","969-703 Mauris Street","60532","Verrès","0619228269","ut@acsem.ca","Particulier","40","5"),("Roux","Ambre","1","Ap #702-6655 Mauris Avenue","46507","Aylmer","Ap #129-2616 Nulla St.","27389","Smolensk","0530302353","mauris.ut@arcuVestibulum.edu","Particulier","40","5");

INSERT INTO `customers` (`cus_lastname`,`cus_firstname`,`cus_sex`,`cus_bil_address`,`cus_bil_postalcode`,`cus_bil_city`,`cus_del_address`,`cus_del_postalcode`,`cus_del_city`,`cus_phone`,`cus_mail`,`cus_type`,`cus_coef`,`cus_rep_id`) VALUES ("Roche","Célia","1","Ap #386-8760 Semper Road","20084","Rupelmonde","579-1148 Dis Avenue","99933","Asso","0598133004","sociis@sedleoCras.net","Professionnel","20",3),("Fournier","Elsa","1","9222 Vulputate Street","47240","Getafe","2671 Tellus Avenue","65076","Llandovery","0224951980","pellentesque.tellus.sem@dolorsit.org","Professionnel","20",1),("Guyot","Marion","1","8293 Ultrices Road","52874","Mol","379-7644 Maecenas Street","97477","Carmarthen","0679902597","Integer.eu.lacus@elementumlorem.co.uk","Professionnel","20",3),("Laine","Juliette","1","P.O. Box 555, 5879 Sodales Rd.","08507","Trevignano Romano","Ap #373-2950 Et St.","46673","East Jakarta","0673672349","Suspendisse.sagittis.Nullam@Donecconsectetuer.ca","Professionnel","20",4),("Francois","Lauriane","1","Ap #238-2377 Dictum Ave","78854","Blitar","Ap #842-7895 Lorem Ave","50408","Wardin","0959483273","amet.faucibus.ut@sapiencursus.edu","Professionnel","20",3),("Barre","Julia","1","837-3657 Felis Avenue","75573","Fernie","P.O. Box 246, 4267 Odio. Rd.","67730","Hamme","0220694746","turpis.egestas.Fusce@mi.org","Professionnel","20",1),("Denis","Maïlé","1","498-5780 Sem, St.","90424","Glasgow","P.O. Box 105, 6773 Ipsum. Ave","04265","Swan Hills","0268385804","mauris.Morbi@nullamagnamalesuada.ca","Professionnel","20",4),("Paris","Élise","1","Ap #664-9234 Enim. Ave","94676","Osorno","Ap #215-735 Sed Rd.","65559","Jedburgh","0103541285","lacus.Mauris@orciinconsequat.com","Professionnel","20",2),("Roussel","Yüna","1","501-7804 Nam Av.","12557","Betim","P.O. Box 543, 6630 Tortor St.","15728","Peterhead","0296035718","at@Nullamlobortisquam.com","Professionnel","20",4),("Louis","Sarah","1","1085 Vehicula Rd.","68238","Bella","9404 Dolor, Ave","42317","Asti","0676106827","consectetuer.mauris.id@molestiesodalesMauris.org","Professionnel","20",4);

INSERT INTO `customers` (`cus_lastname`,`cus_firstname`,`cus_sex`,`cus_bil_address`,`cus_bil_postalcode`,`cus_bil_city`,`cus_del_address`,`cus_del_postalcode`,`cus_del_city`,`cus_phone`,`cus_mail`,`cus_type`,`cus_coef`,`cus_rep_id`) VALUES ("Royer","Dylan","0","3091 Nunc Av.","02456","Saint-Dizier","137-9567 Nam Rd.","61458","Bandırma","0962260786","malesuada.fames@nonvestibulumnec.net","Professionnel","20",4),("Picard","Lorenzo","0","P.O. Box 734, 3404 Eget St.","03029","Boca del Río","P.O. Box 888, 2666 Sit St.","50536","Pointe-au-Pic","0869309269","neque.sed@at.com","Professionnel","20",1),("Dumont","Gabriel","0","Ap #608-6775 Natoque Rd.","20980","Dalbeattie","395-4116 Enim Av.","38675","Napier","0525929150","vitae@vitaeodio.com","Professionnel","20",2),("Blanchard","Corentin","0","3759 Enim, Street","75749","Borchtlombeek","Ap #999-3125 Aliquet. St.","49242","Lanester","0420510403","sit.amet@velitegetlaoreet.co.uk","Professionnel","20",2),("Henry","Killian","0","Ap #910-4587 Lacus. Road","73860","Barasat","Ap #353-9582 Vulputate St.","08040","Annapolis","0646326706","lacus.varius@ategestas.org","Professionnel","20",2),("Gay","Tom","0","P.O. Box 747, 7235 Cursus Rd.","68253","Caprino Bergamasco","P.O. Box 614, 3174 Semper Rd.","79530","Lithgow","0626795129","nunc@erategetipsum.edu","Professionnel","20",4),("Noel","Ethan","0","586-3803 Condimentum. Rd.","90672","Marzabotto","323-447 Proin Street","45815","Bognor Regis","0536350008","non.hendrerit.id@urnaVivamusmolestie.net","Professionnel","20",1),("Rodriguez","Mathis","0","P.O. Box 887, 8715 Pede, Av.","18141","Contulmo","710-2522 Egestas. Road","71273","Inírida","0482025438","nunc.nulla@bibendumfermentummetus.org","Professionnel","20",4),("Pons","Diego","0","5649 Magna, Rd.","14481","Cerami","Ap #911-8453 Tincidunt St.","95953","Chungju","0167308729","Phasellus.vitae.mauris@nulla.ca","Professionnel","20",3),("Maillard","Léonard","0","P.O. Box 206, 9826 Quisque St.","23952","Hereford","P.O. Box 280, 1245 Pellentesque Rd.","47370","Monte Patria","0393010109","Mauris@Nullamnisl.net","Professionnel","20",2);

INSERT INTO `customers` (`cus_lastname`,`cus_firstname`,`cus_sex`,`cus_bil_address`,`cus_bil_postalcode`,`cus_bil_city`,`cus_del_address`,`cus_del_postalcode`,`cus_del_city`,`cus_phone`,`cus_mail`,`cus_type`,`cus_coef`,`cus_rep_id`) VALUES ("Picard","Yohan","0","4790 Laoreet Street","60197","Romford","P.O. Box 550, 4708 Maecenas St.","50008","Edmundston","0517450533","Maecenas.ornare@mattisornare.ca","Particulier","40","5"),("Duval","Adrien","0","P.O. Box 767, 6601 Dignissim Rd.","58315","Cali","939-4689 Natoque Road","59781","Sawahlunto","0822577352","neque@nequeNullamut.co.uk","Particulier","40","5"),("Vincent","Bruno","0","P.O. Box 498, 113 Eget, St.","14366","Andenne","Ap #951-5343 Odio Av.","05550","Hay-on-Wye","0686134694","vel.est.tempor@nonbibendum.ca","Particulier","40","5"),("Charles","Martin","0","971-5517 Tristique Road","69958","Sant'Arsenio","943-1355 Diam. Rd.","30094","Puerto Carreño","0199750580","bibendum.fermentum.metus@taciti.org","Particulier","40","5"),("Rey","Gabin","0","P.O. Box 919, 4656 Ipsum St.","54613","HŽlŽcine","8265 Vivamus Road","44648","Fort Wayne","0202443483","elit@vestibulum.net","Particulier","40","5"),("Faure","Kilian","0","7476 Iaculis Ave","62708","Pontedera","361-4267 Lectus Avenue","84197","Villahermosa","0124145340","sit.amet.ante@aliquamarcu.com","Particulier","40","5"),("Huet","Tom","0","5605 Ligula Rd.","48473","Chennai","P.O. Box 581, 4017 Ridiculus Av.","36737","Coinco","0486493683","Aenean.eget.magna@justonecante.ca","Particulier","40","5"),("Guerin","Louis","0","562-4918 Nunc Street","33026","White Rock","Ap #183-6792 Lorem Street","41364","Stratford-upon-Avon","0121810160","Etiam@Phasellus.com","Particulier","40","5"),("Nicolas","Hugo","0","7481 Consequat Street","66563","Idaho Falls","Ap #148-107 Sed Rd.","89923","Liedekerke","0898751603","lacus.Quisque.imperdiet@utnulla.com","Particulier","40","5"),("Meunier","Ethan","0","8962 Purus St.","01776","Craco","651-5039 Et, St.","81741","Vremde","0760565982","in.molestie@Suspendisse.com","Particulier","40","5");

-- Table suppliers --

INSERT INTO `suppliers` (`sup_type`,`sup_name`,`sup_address`,`sup_postalcode`,`sup_city`,`sup_contact`,`sup_phone`,`sup_mail`) VALUES ("Fabricant","Fender Musical Instruments Corporation","CP 742, 6133 Dis Avenue","170977","Owensboro","Maite Medina","0594370721","Morbi.accumsan@fermentum.org"),("Fabricant","Cort Instruments Korea","361-3922 Turpis Route","38364","Peutie","Vincent Holt","0897853749","risus.varius@laoreetipsumCurabitur.org"),("Importateur","Epiphone America","2636 Sit Av.","36187","Mastung","Kasimir Hall","0355647271","ornare@uteratSed.ca"),("Importateur","YAMAHA Instruments Corp.","9602 Felis Ave","30250","Malang","Georgia Puckett","0561885439","Duis@orci.net"),("Importateur","Ipsum Suspendisse Sagittis Foundation","923 Mus. Chemin","547696","Pontevedra","Adara Mcfarland","0868471863","amet.lorem.semper@Curabiturvellectus.edu"),("Fabricant","Nisl Nulla Eu LLC","6734 Nonummy Ave","07666","Cape Breton Island","Wang Mendez","0549789445","feugiat@arcuVestibulum.ca"),("Fabricant","Commodo Tincidunt Nibh LLC","937-8749 Neque Rd.","220676","Kruibeke","Lacy Tillman","0998931745","aliquet.libero@fringilla.net"),("Importateur","Rhoncus Proin Nisl LLP","4373 Donec Avenue","476625","Saint-Malo","Shelly Byers","0338398015","libero.Integer@dolorelit.co.uk"),("Fabricant","Torquent Per PC","767-1244 Nibh. Rue","65406","Novosibirsk","Daryl Head","0490881135","quis@mauris.edu"),("Importateur","Mollis Phasellus Libero LLC","CP 428, 8955 At, Av.","8616","Hugli-Chinsurah","Randall Cain","0978679508","lobortis@Crasconvallisconvallis.co.uk"),("Importateur","Leo Elementum Sem LLP","CP 760, 133 Dignissim. Rue","39066","Jeongeup","Brianna Britt","0709321935","quis.accumsan@nuncsed.net"),("Importateur","Cursus Diam PC","Appartement 867-8513 Morbi Chemin","64685","Sant'Ilario dello Ionio","Yoshio Howard","0806326758","ac.metus@semegestas.ca"),("Fabricant","Accumsan Limited","137-1235 Nonummy Chemin","56453","San Vicente","Nehru Wiley","0907797030","aliquam.arcu@Namporttitorscelerisque.edu"),("Importateur","Egestas Urna PC","Appartement 929-7748 Eu Avenue","64787","Miranda","Dieter Bowers","0379815833","non.ante.bibendum@ipsum.edu"),("Importateur","Natoque Inc.","CP 730, 9920 Urna. Route","66229","Montpelier","Bertha Spears","0818213612","ipsum@elitpharetra.org");

-- Table products --

INSERT INTO `products`(`pro_ref`, `pro_label`, `pro_desc`, `pro_ppet`, `pro_spet`, `pro_phy_stk`, `pro_lock`, `pro_add_date`, `pro_sup_id`, `pro_cat_id`) VALUES ("K3847F", "Fender Stratocaster", "3 micros simple bobinage, corps aulne, manche érable", 440, 549, 2, 0, "2015-12-24", 1, 8), ("KFDJ4U8", "Fender Telecaster", "1 micro simple bobinage et 1 double, corps aulne, manche érable", 424, 579, 3, 0, "2014-08-21", 1, 8), ("2845JGO2", "Cort MBC-1", "1 micro simple bobinage et 1 double Manson, corps aulne, manche érable, touche palissandre", 499, 649, 3, 0, "2016-06-11", 2, 8), ("JDFI387", "Cort Action", "2 micros simple, corps acajou, manche érable", 349, 469, 5, 0, "2018-09-01", 2, 12), ("2JD7Y2", "Epiphone LesPaul Standard Plus Pro", "2 micros Burstbucker, corps acajou, manche acajou, touche palissandre", 389, 499, 5, 0, "2013-06-05", 3, 8), ("FG700", "Yamaha FG 700", "corps palissandre, manche acajou, touche palissandre", 289, 429, 5, 0, "2014-04-02", 4, 10), ("2845JGO2LH", "Cort MBC-1 LH", "Version gaucher 1 micro simple bobinage et 1 double Manson, corps aulne, manche érable, touche palissandre", 549, 689, 3, 0, "2016-06-11", 2, 8);

-- Table order status --

INSERT INTO `order_status`(`ost_label`) VALUES ("En cours de traitement"), ("En préparation"), ("Expédiée"), ("Livrée"), ("Facturée"), ("Retard de paiement"), ("Soldée"), ("Annulée");

-- Table orders --

INSERT INTO `orders`(`ord_date`, `ord_discount`, `ord_pay_method`, `ord_ost_id`, `ord_cus_id`, `ord_del_time`, `ord_bil_date`) VALUES ("2021-01-20", 5, "Comptant", 5, 5, "2021-01-23", "2021-01-23"), ("2021-02-10", 0, "Comptant", 5, 8, "2021-02-15", "2021-02-15"), ("2021-03-14", 0, "Comptant", 5, 39, "2021-03-19", "2021-03-20"), ("2021-04-17", 10, "Différé", 5, 14, "2021-04-21", "2021-04-25"), ("2021-04-10", 10, "Différé", 5, 25, "2021-04-19", "2021-04-20"), ("2021-02-04", 0, "Différé", 5, 17, "2021-02-15", "2021-02-15"), ("2021-06-14", 0, "Différé", 3, 29, "2021-06-18", null);

-- Table order details --

INSERT INTO `order_details`(`ode_qty`, `ode_tot_exc_tax`, `ode_tax_rate`, `ode_tot_all_tax_inc`, `ode_pro_id`, `ode_ord_id`) VALUES (1, 549.00, 20.00, 659.80, 1, 1), (1, 579.00, 20.00, 694.80, 2, 2), (1, 649.00, 20.00, 778.80, 3, 3), (1, 469.00, 20.00, 562.80, 4, 4), (1, 499.00, 20.00, 598.80, 5, 5), (1, 429.00, 20.00, 514.80, 6, 6), (1, 689.00, 20.00, 826.80, 7, 7), (1, 579.00, 20.00, 694.80, 2, 7);

-- Table delivery details --

INSERT INTO `delivery_details`(`dde_qty`, `dde_ode_id`, `dde_del_date`) VALUES (1, 1, "2021-01-23"), (1, 2, "2021-02-15"), (1, 3, "2021-03-20"), (1, 4, "2021-04-25"), (1, 5, "2021-04-20"), (1, 6, "2021-02-15"), (1, 7, "2021-06-17"), (1, 8, "2021-06-17");