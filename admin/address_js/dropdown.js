// Sample Data for Provinces, Cities, and Municipalities
const data = {
    "NCR": {
       "Metro Manila": {
                         "Quezon City": [
                             "Barangay Baño",
                             "Barangay Bagong Pag-asa",
                             "Barangay Commonwealth",
                             "Barangay Loyola Heights"
                         ],
                         "Makati": [
                             "Barangay Bel-Air",
                             "Barangay Poblacion",
                             "Barangay San Lorenzo",
                             "Barangay Dasmariñas"
                         ],
                         "Manila": [
                             "Barangay Quiapo",
                             "Barangay Ermita",
                             "Barangay Malate",
                             "Barangay San Nicolas"
                         ],
                         "Calooocan": [
                             "Barangay 1",
                             "Barangay 2",
                             "Barangay 3",
                             "Barangay 4"
                         ],
                         "Pasig": [
                             "Barangay Kapitolyo",
                             "Barangay San Antonio",
                             "Barangay Bagong Ilog",
                             "Barangay Ugong"
                         ],
                         "Taguig": [
                             "Barangay Fort Bonifacio",
                             "Barangay Central Bicutan",
                             "Barangay Hagonoy",
                             "Barangay Lower Bicutan"
                         ],
                         "Mandaluyong": [
                             "Barangay Buayang Bato",
                             "Barangay Addition Hills",
                             "Barangay Highway Hills",
                             "Barangay Plainview"
                         ],
                         "Pateros": [
                             "Barangay San Roque",
                             "Barangay Santo Rosario",
                             "Barangay San Mateo",
                             "Barangay Santo Niño"
                         ],
                         "Marikina": [
                             "Barangay San Roque",
                             "Barangay Concepcion Uno",
                             "Barangay Barangka",
                             "Barangay Calumpang"
                         ],
                         "Las Piñas": [
                             "Barangay Talon Uno",
                             "Barangay Pamplona Tres",
                             "Barangay Almanza Dos",
                             "Barangay Zapote"
                         ],
                         "Parañaque": [
                             "Barangay Baclaran",
                             "Barangay San Dionisio",
                             "Barangay Tambo",
                             "Barangay Don Bosco"
                         ],
                         "Navotas": [
                             "Barangay San Jose",
                             "Barangay Tanza",
                             "Barangay Navotas East",
                             "Barangay Navotas West"
                         ],
                         "Valenzuela": [
                             "Barangay Karuhatan",
                             "Barangay Ugong",
                             "Barangay Malanday",
                             "Barangay Gen. T. De Leon"
                         ],
                         "San Juan": [
                             "Barangay Corazon de Jesus",
                             "Barangay Greenhills",
                             "Barangay Salapan",
                             "Barangay Balong-Bato"
                         ],
                         "Makati": [
                             "Barangay San Lorenzo",
                             "Barangay Bel-Air",
                             "Barangay Poblacion",
                             "Barangay Dasmariñas"
                         ]
                        },
                            "Makati": {
                                 "Barangay Bel-Air": [
                                     "Address 1, Bel-Air, Makati",
                                     "Address 2, Bel-Air, Makati"
                                 ],
                                 "Barangay Poblacion": [
                                     "Address 1, Poblacion, Makati",
                                     "Address 2, Poblacion, Makati"
                                 ],
                                 "Barangay San Lorenzo": [
                                     "Address 1, San Lorenzo, Makati",
                                     "Address 2, San Lorenzo, Makati"
                                 ],
                                 "Barangay Dasmariñas": [
                                     "Address 1, Dasmariñas, Makati",
                                     "Address 2, Dasmariñas, Makati"
                                 ],
                                 "Barangay Guadalupe Nuevo": [
                                     "Address 1, Guadalupe Nuevo, Makati",
                                     "Address 2, Guadalupe Nuevo, Makati"
                                 ],
                                 "Barangay Rizal": [
                                     "Address 1, Rizal, Makati",
                                     "Address 2, Rizal, Makati"
                                 ]
                            },
                            "Manila": {
        "Barangay Quiapo": [
            "Address 1, Quiapo, Manila",
            "Address 2, Quiapo, Manila"
        ],
        "Barangay Ermita": [
            "Address 1, Ermita, Manila",
            "Address 2, Ermita, Manila"
        ],
        "Barangay Malate": [
            "Address 1, Malate, Manila",
            "Address 2, Malate, Manila"
        ],
        "Barangay San Nicolas": [
            "Address 1, San Nicolas, Manila",
            "Address 2, San Nicolas, Manila"
        ],
        "Barangay Tondo": [
            "Address 1, Tondo, Manila",
            "Address 2, Tondo, Manila"
        ],
        "Barangay Intramuros": [
            "Address 1, Intramuros, Manila",
            "Address 2, Intramuros, Manila"
        ]
                            },
                            "Caloocan": {
        "Caloocan City": {
            "Barangay 7": [
                "Address 1, Caloocan City",
                "Address 2, Caloocan City"
            ],
            "Barangay 8": [
                "Address 1, Caloocan City",
                "Address 2, Caloocan City"
            ],
            "Barangay 9": [
                "Address 1, Caloocan City",
                "Address 2, Caloocan City"
            ],
            "Barangay 10": [
                "Address 1, Caloocan City",
                "Address 2, Caloocan City"
            ],
            "Barangay 11": [
                "Address 1, Caloocan City",
                "Address 2, Caloocan City"
            ],
            "Barangay 12": [
                "Address 1, Caloocan City",
                "Address 2, Caloocan City"
            ]
        
    },
            "Malabon": {
                "Barangay 9": ["Address 1, Malabon", "Address 2, Malabon"],
                "Barangay 10": ["Address 1, Malabon", "Address 2, Malabon"]
            }
                            },
                            "Pasig": {
            "Barangay 11": ["Address 1, Pasig", "Address 2, Pasig"],
            "Barangay 12": ["Address 1, Pasig", "Address 2, Pasig"]
                            },
                            "Taguig": {
            "Barangay 13": ["Address 1, Taguig", "Address 2, Taguig"],
            "Barangay 14": ["Address 1, Taguig", "Address 2, Taguig"]
                             },
                             "Mandaluyong": {
            "Barangay 15": ["Address 1, Mandaluyong", "Address 2, Mandaluyong"],
            "Barangay 16": ["Address 1, Mandaluyong", "Address 2, Mandaluyong"]
                             },
                             "San Juan": {
            "Barangay 17": ["Address 1, San Juan", "Address 2, San Juan"],
            "Barangay 18": ["Address 1, San Juan", "Address 2, San Juan"]
                             },
                             "Pateros": {
            "Barangay 19": ["Address 1, Pateros", "Address 2, Pateros"],
            "Barangay 20": ["Address 1, Pateros", "Address 2, Pateros"]
                             },
                             "Marikina": {
            "Barangay 21": ["Address 1, Marikina", "Address 2, Marikina"],
            "Barangay 22": ["Address 1, Marikina", "Address 2, Marikina"]
                             },
                             "Las Piñas": {
            "Barangay 23": ["Address 1, Las Piñas", "Address 2, Las Piñas"],
            "Barangay 24": ["Address 1, Las Piñas", "Address 2, Las Piñas"]
                             },
                             "Parañaque": {
            "Barangay 25": ["Address 1, Parañaque", "Address 2, Parañaque"],
            "Barangay 26": ["Address 1, Parañaque", "Address 2, Parañaque"]
                             },
                             "Valenzuela": {
            "Barangay 27": ["Address 1, Valenzuela", "Address 2, Valenzuela"],
            "Barangay 28": ["Address 1, Valenzuela", "Address 2, Valenzuela"]
                             },
                             "Pasay": {
            "Barangay 29": ["Address 1, Pasay", "Address 2, Pasay"],
            "Barangay 30": ["Address 1, Pasay", "Address 2, Pasay"]
                             },
                             "Navotas": {
            "Barangay 31": ["Address 1, Navotas", "Address 2, Navotas"],
            "Barangay 32": ["Address 1, Navotas", "Address 2, Navotas"]
                             }
    },


    
        "CAR": {
            "Agusan del Norte": {
                "Butuan City": ["Barangay 1", "Barangay 2"],
                "Nasipit": ["Barangay 3", "Barangay 4"],
                "Buenavista": ["Barangay 5", "Barangay 6"]
            },
            "Agusan del Sur": {
                "Talacogon": ["Barangay 7", "Barangay 8"],
                "Bunawan": ["Barangay 9", "Barangay 10"],
                "San Francisco": ["Barangay 11", "Barangay 12"]
            },
            "Surigao del Norte": {
                "Surigao City": ["Barangay 13", "Barangay 14"],
                "Siargao": ["Barangay 15", "Barangay 16"],
                "Bancasi": ["Barangay 17", "Barangay 18"]
            },
            "Surigao del Sur": {
                "Tandag City": ["Barangay 19", "Barangay 20"],
                "Bislig City": ["Barangay 21", "Barangay 22"],
                "Carmen": ["Barangay 23", "Barangay 24"]
            },
            "Dinagat Islands": {
                "San Jose": ["Barangay 25", "Barangay 26"],
                "Cagdianao": ["Barangay 27", "Barangay 28"]
            }
        },
    
    


        "Region I": {
            "Ilocos Norte": {
                "Adams": ["Adams"],
                "Bacarra": ["Bani", "Buyon","Cabaruan","Cabulalaan","Cabusligan","Cadaratan","Calioet-Libong","Casilian","Corocor","Duripes","Ganagan","Libtong","Macupit","Nambaran","Natba","Paninaan","Pasiocan","Pasngal","Pipias","Pulangi","Pungto","San Agustin I","San Agustin II","San Andres I", "San Andres II", "San Gabriel I","San Gabriel II","San Pedro I","San Pedro II","San Roque I","San Roque II","San Simon I","San Simon II","San Vicente","Sangil","San Filomena I","San Filomena II","San Rita","Santo Cristo I","Santo Cristo II","Tambidao","Teppang","Tubburan"],
                "Badoc": ["Alay-Nangbabaab", "Alogoog","Ar-arusip","Aring","Balbaldez","Bato","Camanga","Canaan","Caraitan","Gabut Norte","Gabut Sur","Garreta","La Virgen Milagrosa","Labut","Lacuben","Lubigan","Mabusag Norte","Mabusag Sur","Madupayas","Morong","Nagrebcan","Napu","Pagsanahan Norte","Pagsanahan Sur","Paltit","Parang","Pasuc","Santa Cruz Norte","Santa Cruz Sur","Saud","Turod"],
                "Bangui": ["Abaca", "Bacsil","Banban","Baruyen","Dadaor","Lanao","Malasin","Manayon","Masikil","Nagbalagan","Payac","San Lorenzo","Taguiporo","Utol"],
                "Banna": ["Balioeg", "Bangsar","Barbarangay","Binacag","Bomitong","Bugasi","Caestebanan","Caribquib","Catagtaguen","Crispina","Hilario","Imelda","Lorenzo","Macayepyep","Marcos","Nagpatayan","Sinamar","Tabtabagan","Valdez","Valenciano"],
                "Batac": ["Ablan Poblacion", "Acosta Poblacion","Aglipay","Baay","Baligat","Baoa East","Baoa West","Barani","Ben-agan","Bil-loca","Biningan","Bungon","Callaguip","Camandigan","Camguidan","Cangrunaan","Capacuan","Caunayan","Colo","Dariwdiw","Lacub","Mabaleng","Magnuang","Maipalig","Nagbacalan","Naguirangan","Palongpong","Palpalicong","Parangopong","Payao","Pimentel","Quiling Norte","Quiling Sur","Quiom","Rayuray","Ricarte Poblacion","San Julian","San Mateo","San Pedro","Suabit","Sumader","Tabug","Valdez Poblacion"],
                "Burgos": ["Ablan Sarat", "Agaga","Bayog","Bobon","Buduan","Nagsurot","Paayas","Pagali","Poblacion","Saoit","Tanap"],
                "Carasi": ["Angset", "Barbaqueso","Virbira"],
                "Currimao": ["Anggapang Norte", "Anggapang SUr", "Bimanga", "Cabuusan","Comcomloong","Gaang","Lang-ayan-Baramban","Lioes","Maglaoi Centro","Maglaoi Norte","Maglaoi Sur","Paguludan-Salindeg","Pangil","Pias Norte","Pias Sur","Poblacion I","Poblacion II","Salugan","San Simeon","Santa Cruz","Tapao-Tigue","Torre","Victoria"],
                "Dingras": ["Albano", "Bacsil","Bagut","Baresbes","Barong","Bungcag","Cali","Capasan","Dancel","Elizabeth","Espiritu","Foz","Guerrero","Lanas","Lumbad","Madamba","Mandalaloque","Medina","Parado","Peralta","Puruganan","Root","Sagpatan","Saludares","San Esteban","San Franciso","San Marcelino","San Marcos","Sulquiano","Suyo","Ver"],
                "Dumalneg": ["Cabaritan", "Kalaw","Quibel","San Isidro"],
                "Laoag": ["Barangay No. 1, San Lorenzo", "Barangay No. 10, San Jose","Barangay No. 11, Santa Balbina","Barangay No. 12, San Isidro","Barangay No. 13, Nuestra Senora de Visitacion","Barangay No. 14, Santo Tomas","Barangay No, 15, San Guillermo","Barangay No. 16, San Jacinto", "Barangay No. 17, San Francisco", "Barangay No. 18, San Quirino", "Barangay No. 19, Santa Marcela", "Barangay No. 2, Santa Joaquina","Barangay No. 20, San Miguel","Barangay No. 21, San Pedro","Barangay No. 22, San Andres","Barangay No. 23, San Matias", "Barangay No. 24. Nuestra Senora de Consolacion","Barangay No. 25, Santa Cayetana", "Barangay No. 26, San Marcelino", "Barangay No.28, Nuestra Senora de Soledad", "Barangay No. 28, San Bernardo", "Barangay No. 29, Santo Thomas", 
                            "Barangay No. 3, Nuestra Senora del Rosario", "Barangay No. 30-A, Suyo", "Barangay No. 30-B, Santa Maria","Barangay No. 31, Talingaan","Barangay No. 32-A, La Paz East", "Barangay No. 32-B, La Paz West", "Barangay No. 32-C La Paz East", "Barangay No. 33-A, La Paz Proper", "Barangay No. 33-B, La Paz Proper", "Barangay No. 34-A, Gabu Norte West", "Barangay No. 34-B, Gabu Norte East", "Barangay No. 35, Gabu Sur", "Barangay No. 36, Araniw", "Barangay No. 37, Calayab", "Barangay No. 38-A, Managato East", "Barangay No. 38-B, Mangato West", "Barangay No. 39, Santa Rosa", "Barangay No. 4, San Guillermo","Barangay No. 40, Balatong","Barangay No. 41, Balacad", "Barangay No. 42, Apaya", "Barangay No. 43, Cavit", "Barangay No. 44, Zamboanga", "Barangay No. 45, Tangid", "Barangay No. 46, Nalbo", "Barangay No. 47, Bengcag","Barangay No. 48-A, Cabungaan North", "Barangay No. 48-B, Cabungaan South", "Barangay No. 49-A, Darayday", "Barangay No. 49-B, Raraburan", "Barangay No. 5, San Pedro", "Barangay No. 50, Buttong", "Barangay No. 51-B, Nangalisan West", "Barangay No. 52-A, San Mateo", "Barangay No. 52-B, Lataag", "Barangay No. 53, Rioeng","Barangay No. 54-A, Lagui-Sail", "Barangay No. 54-B, Camangaan","Barangay No. 55-A, Barit-Pandan","Barangay No, 55-B, Salet-Bulangon", "Barangay No, 55-C, Vira", "Barangay No. 56-A, Bacsil North", "Barangay No. 56-B, Bacsil South", "Barangay No, 57, Pila","Barangay No. 58, Casili","Barangay No. 59-A, Dibua South","Barangay No. 59-B, Dibua North", "Barangay No. 6, San Agustin", "Barangay No. 60-A, Caaoacan", "Barangay No. 60-B, Madiladig", "Barangay No. 61, Cataban", "Barangay No. 62-A, Navotas North", "Barangay No. 62-B, Navotas South", "Barangay No. 7-A, Nuestra Senora de Natividad","Barangay No. 7-B, Nuestra Senora de Nativadad","Barangay No. 8, San Vicente", "Barangay No. 9, Santa Angela"],
                "Marcos": ["Cacafean", "Daquioag", "Elizabeth", "Escoda", "Ferdinand", "Fortuna","Imelda","Lydia","Mabuti","Pacifico","Santiago","Tabucbuc","Valdez"],
                "Nueva Era": ["Acnam", "Barangobong", "Barikir","Bugayong","Cabittauran","Caray","Garnaden","Naguillan","Poblacion","Santo Nino","Uguis"],
                "Pagudpud": ["Aggasi", "Badung", "Balaoi","Caparispisan","Caunayan","Dampig","Ligaya","Pancian","Pasaleng","Poblacion 1","Poblacion 2", "Saguigui","Saud","Subec","Tarrag"],
                "Paoay": ["Bacsil", "Cabagoan","Cabangaran","Callaguip","Cayubog","Dolores","Laoa","Masintoc","Monte","Mumulaan","Nagbacalan","Nalasin","Nanguyudan","Oaig-Upay-Abulao","Pambaran","Pannaratan","Paratong","Pasil","Salbang","San Agustin","San Blas","San Juan","San Pedro","San Roque","Sangladan Poblacion","Santa Rita","Sideg","Suba","Sungadan","Surgui","Veronica"],
                "Pasuquin": ["Batuli", "Binsang","Caruan","Carusikis","Carusipan","Dadaeman","Darupidip","Davila","Dilanis","Dilayo","Estancia","Naglicuan","Nagsanga","Nalvo","Ngabangab","Pangil","Poblacion 1","Poblacion 2","Poblacion 3","Poblacion 4","Pragata","Puyupuyan","Salpad","San Juan","Santa Catalina","Santa MAtilde","Sapat","Sulbec","Sulongan","Surong","Susugaen","Tabungao","Tadao"],
                "Piddig": ["Ab-abut", "Abucay","Anao","Arua-ay","Bimmanga","Boyboy","Cabaroan","Calambeg","Callusa","Dupitac","Estancia","Gayamat","Lagandit","Libnaoan","Loing","Maab-abaca","Mangitayag","Maruaya","San Antonio","Santa Maria","Sucsuquen","Tangaoan","Tonoton"],
                "Pinili": ["Aglipay", "Apatut-Lubong", "Badio","Barbar","Buanga","Bulbulala","Bungro","Cabaroan","Capangdanan","Dalayap","Darat","Gulpeng","Liliputen","Lumbaan-Bicbica","Nagtrigoan","Pugaoan","Puritac","Puzol","Sacritan","Salanap","Santo Tomas","Tartarabang","Upon","Valbuena"],
                "San Nicolas": ["San Agustin", "San Baltazar", "San Bartolome", "San Cayetano","San Eugenio","San Fernando","San Francisco","San Gregorio","SAn Guillermo","San Ildefonso","San Jose","San Juan Bautista","San Lorenzo","San Lucas","San Marcos","San Miguel","San Pablo","San Paulo","San Pedro","San Rufino","San Silvestre","Santa Asuncion","Santa Cecilia","Santa Monica"],
                "Sarrat": ["San Agustin", "San Andres", "San Anotonio", "San Bernabe","San Cristobal","San Felipe","San Francisco","San Isidro","San Juaquin","San Jose","San Juan","San Leandro","San Lorenzo","San Manuel","San Marcos","San Nicolas","San Pedro","San Roque","San Vicente","Santa Barbara","Santa Magdalena","Santa Rosa","Santo Santiago","Santo Tomas"],
                "Solsona": ["Aguitap", "Bagbag","Bagbago","Barcelona","Bubuos","Capuricatan","Catangraran","Darasdas","Juan","Laureta","Lipay","Maananteng","Manalpac","Mariquet","Nagpatpatan","Nalasin","Puttao","San Juan","San Julian","Santa Ana","Santiago","Talugtog"],
                "Vintar": ["Abkir", "Alejo Malasig", "Alsem","Bago","Bulbulala","Cabangaran","Cabayo","Cabisocolan","Canaam","Columbia","Dagupan","Dipilat","Esperanza","Ester","Isic isic","Lubnac","Mabanbanag","Malampa","Manarang","Margaay","Namoroc","Parparoroc","Parut","Pedro F. Alviar","Salsalamagui","San Jose","San Nicolas","San Pedro","San Ramon","San Roque","Santa Maria","Tamdagan","Visaya"]
            },
            "Ilocos Sur": {
                "Vigan City": ["Barangay 9", "Barangay 10"],
                "Candon": ["Barangay 11", "Barangay 12"],
                "Santo Domingo": ["Barangay 13", "Barangay 14"],
                "Sigay": ["Barangay 15", "Barangay 16"]
            },
            "La Union": {
                "San Fernando City": ["Barangay 17", "Barangay 18"],
                "Bauang": ["Barangay 19", "Barangay 20"],
                "Agoo": ["Barangay 21", "Barangay 22"],
                "Aringay": ["Barangay 23", "Barangay 24"]
            },
            "Pangasinan": {
                "Lingayen": ["Barangay 25", "Barangay 26"],
                "Dagupan City": ["Barangay 27", "Barangay 28"],
                "San Carlos City": ["Barangay 29", "Barangay 30"],
                "Umingan": ["Barangay 31", "Barangay 32"]
            }
        },




        "Region II": {
            "Cagayan": {
                "Tuguegarao City": ["Barangay 1", "Barangay 2"],
                "Aparri": ["Barangay 3", "Barangay 4"],
                "Piat": ["Barangay 5", "Barangay 6"],
                "Lal-lo": ["Barangay 7", "Barangay 8"]
            },
            "Isabela": {
                "Ilagan City": ["Barangay 9", "Barangay 10"],
                "Santiago City": ["Barangay 11", "Barangay 12"],
                "Cabagan": ["Barangay 13", "Barangay 14"],
                "Jones": ["Barangay 15", "Barangay 16"]
            },
            "Nueva Vizcaya": {
                "Bayombong": ["Barangay 17", "Barangay 18"],
                "Solano": ["Barangay 19", "Barangay 20"],
                "Dupax del Norte": ["Barangay 21", "Barangay 22"],
                "Dupax del Sur": ["Barangay 23", "Barangay 24"]
            },
            "Quirino": {
                "Cabarroguis": ["Barangay 25", "Barangay 26"],
                "Saguday": ["Barangay 27", "Barangay 28"],
                "Diffun": ["Barangay 29", "Barangay 30"]
            }
        },
        
            "Region III": {
                "Aurora": {
                    "Baler": ["Barangay 1", "Barangay 2"],
                    "Casiguran": ["Barangay 3", "Barangay 4"],
                    "Dilasag": ["Barangay 5", "Barangay 6"],
                    "Dipaculao": ["Barangay 7", "Barangay 8"]
                },
                "Bulacan": {
                    "Malolos City": ["Barangay 9", "Barangay 10"],
                    "Meycauayan City": ["Barangay 11", "Barangay 12"],
                    "San Jose del Monte": ["Barangay 13", "Barangay 14"],
                    "Santa Maria": ["Barangay 15", "Barangay 16"]
                },
                "Nueva Ecija": {
                    "Cabanatuan City": ["Barangay 17", "Barangay 18"],
                    "Gapan City": ["Barangay 19", "Barangay 20"],
                    "Palayan City": ["Barangay 21", "Barangay 22"],
                    "San Jose City": ["Barangay 23", "Barangay 24"]
                },
                "Pampanga": {
                    "San Fernando City": ["Barangay 25", "Barangay 26"],
                    "Angeles City": ["Barangay 27", "Barangay 28"],
                    "Mabalacat City": ["Barangay 29", "Barangay 30"],
                    "Bacolor": ["Barangay 31", "Barangay 32"]
                },
                "Tarlac": {
                    "Tarlac City": ["Barangay 33", "Barangay 34"],
                    "Concepcion": ["Barangay 35", "Barangay 36"],
                    "La Paz": ["Barangay 37", "Barangay 38"],
                    "Pura": ["Barangay 39", "Barangay 40"]
                },
                "Zambales": {
                    "Iba": ["Barangay 41", "Barangay 42"],
                    "Olongapo City": ["Barangay 43", "Barangay 44"],
                    "Subic": ["Barangay 45", "Barangay 46"],
                    "San Antonio": ["Barangay 47", "Barangay 48"]
                }
            
        },


        "Region IV-A": {
        "Cavite": {
            "Kawit": ["Barangay 1", "Barangay 2"],
            "Gen. Emilio Aguinaldo": ["Barangay 3", "Barangay 4"],
            "Imus": ["Barangay 5", "Barangay 6"],
            "Dasmariñas": ["Barangay 7", "Barangay 8"]
        },
        "Laguna": {
            "Santa Rosa": ["Barangay 9", "Barangay 10"],
            "Biñan": ["Barangay 11", "Barangay 12"],
            "Calamba": ["Barangay 13", "Barangay 14"],
            "San Pablo": ["Barangay 15", "Barangay 16"]
        },
        "Batangas": {
            "Batangas City": ["Barangay 17", "Barangay 18"],
            "Lipa City": ["Barangay 19", "Barangay 20"],
            "Tanauan City": ["Barangay 21", "Barangay 22"],
            "Nasugbu": ["Barangay 23", "Barangay 24"]
        },
        "Rizal": {
            "Antipolo": ["Barangay 25", "Barangay 26"],
            "Binangonan": ["Barangay 27", "Barangay 28"],
            "Rodriguez": ["Barangay 29", "Barangay 30"],
            "Taytay": ["Barangay 31", "Barangay 32"]
        },
        "Quezon": {
            "Lucena City": ["Barangay 33", "Barangay 34"],
            "Tayabas": ["Barangay 35", "Barangay 36"],
            "Sariaya": ["Barangay 37", "Barangay 38"],
            "Candelaria": ["Barangay 39", "Barangay 40"]
        }
    },


    "Region IV-B": {
        "Mindoro Occidental": {
            "Mamburao": ["Barangay 1", "Barangay 2"],
            "San Jose": ["Barangay 3", "Barangay 4"],
            "Rizal": ["Barangay 5", "Barangay 6"],
            "Paluan": ["Barangay 7", "Barangay 8"]
        },
        "Mindoro Oriental": {
            "Calapan City": ["Barangay 9", "Barangay 10"],
            "Baco": ["Barangay 11", "Barangay 12"],
            "Gloria": ["Barangay 13", "Barangay 14"],
            "Oriental Mindoro": ["Barangay 15", "Barangay 16"]
        },
        "Marinduque": {
            "Boac": ["Barangay 17", "Barangay 18"],
            "Mogpog": ["Barangay 19", "Barangay 20"],
            "Gasan": ["Barangay 21", "Barangay 22"],
            "Buenavista": ["Barangay 23", "Barangay 24"]
        },
        "Romblon": {
            "Romblon": ["Barangay 25", "Barangay 26"],
            "San Jose": ["Barangay 27", "Barangay 28"],
            "Ferrol": ["Barangay 29", "Barangay 30"],
            "Corcuera": ["Barangay 31", "Barangay 32"]
        },
        "Palawan": {
            "Puerto Princesa City": ["Barangay 33", "Barangay 34"],
            "El Nido": ["Barangay 35", "Barangay 36"],
            "Coron": ["Barangay 37", "Barangay 38"],
            "Roxas": ["Barangay 39", "Barangay 40"]
        }
    },
    "Region V": {
        "Albay": {
            "Legazpi City": ["Barangay 1", "Barangay 2"],
            "Tabaco City": ["Barangay 3", "Barangay 4"],
            "Ligao City": ["Barangay 5", "Barangay 6"],
            "Daraga": ["Barangay 7", "Barangay 8"]
        },
        "Camarines Norte": {
            "Daet": ["Barangay 9", "Barangay 10"],
            "Mercedes": ["Barangay 11", "Barangay 12"],
            "Labo": ["Barangay 13", "Barangay 14"],
            "Vinzons": ["Barangay 15", "Barangay 16"]
        },
        "Camarines Sur": {
            "Naga City": ["Barangay 17", "Barangay 18"],
            "Iriga City": ["Barangay 19", "Barangay 20"],
            "Pili": ["Barangay 21", "Barangay 22"],
            "Bombon": ["Barangay 23", "Barangay 24"]
        },
        "Catanduanes": {
            "Virac": ["Barangay 25", "Barangay 26"],
            "Bato": ["Barangay 27", "Barangay 28"],
            "Pandan": ["Barangay 29", "Barangay 30"],
            "Caramoran": ["Barangay 31", "Barangay 32"]
        },
        "Sorsogon": {
            "Sorsogon City": ["Barangay 33", "Barangay 34"],
            "Bulusan": ["Barangay 35", "Barangay 36"],
            "Matnog": ["Barangay 37", "Barangay 38"],
            "Gubat": ["Barangay 39", "Barangay 40"]
        },
        "Masbate": {
            "Masbate City": ["Barangay 41", "Barangay 42"],
            "Mobo": ["Barangay 43", "Barangay 44"],
            "Pio V. Corpus": ["Barangay 45", "Barangay 46"],
            "Cataingan": ["Barangay 47", "Barangay 48"]
        }
    },
    "Region VI": {
        "Aklan": {
            "Kalibo": ["Barangay 1", "Barangay 2"],
            "Numancia": ["Barangay 3", "Barangay 4"],
            "Madalag": ["Barangay 5", "Barangay 6"],
            "Banga": ["Barangay 7", "Barangay 8"]
        },
        "Antique": {
            "San Jose de Buenavista": ["Barangay 9", "Barangay 10"],
            "Sibalom": ["Barangay 11", "Barangay 12"],
            "Hamtic": ["Barangay 13", "Barangay 14"],
            "Patnongon": ["Barangay 15", "Barangay 16"]
        },
        "Capiz": {
            "Roxas City": ["Barangay 17", "Barangay 18"],
            "Pilar": ["Barangay 19", "Barangay 20"],
            "Mambusao": ["Barangay 21", "Barangay 22"],
            "Dumalag": ["Barangay 23", "Barangay 24"]
        },
        "Iloilo": {
            "Iloilo City": ["Barangay 25", "Barangay 26"],
            "Passi City": ["Barangay 27", "Barangay 28"],
            "San Miguel": ["Barangay 29", "Barangay 30"],
            "Cabatuan": ["Barangay 31", "Barangay 32"]
        },
        "Negros Occidental": {
            "Bacolod City": ["Barangay 33", "Barangay 34"],
            "San Carlos City": ["Barangay 35", "Barangay 36"],
            "Victorias City": ["Barangay 37", "Barangay 38"],
            "Talisay City": ["Barangay 39", "Barangay 40"]
        }
    },

    "Region VII": {
        "Bohol": {
            "Tagbilaran City": ["Barangay 1", "Barangay 2"],
            "Loon": ["Barangay 3", "Barangay 4"],
            "Dumaguete": ["Barangay 5", "Barangay 6"],
            "Baclayon": ["Barangay 7", "Barangay 8"]
        },
        "Cebu": {
            "Cebu City": ["Barangay 9", "Barangay 10"],
            "Mandaue City": ["Barangay 11", "Barangay 12"],
            "Lapu-Lapu City": ["Barangay 13", "Barangay 14"],
            "Toledo City": ["Barangay 15", "Barangay 16"]
        },
        "Negros Oriental": {
            "Dumaguete City": ["Barangay 17", "Barangay 18"],
            "Bayawan City": ["Barangay 19", "Barangay 20"],
            "Tanjay City": ["Barangay 21", "Barangay 22"],
            "Amlan": ["Barangay 23", "Barangay 24"]
        },
        "Siquijor": {
            "Siquijor": ["Barangay 25", "Barangay 26"],
            "Larena": ["Barangay 27", "Barangay 28"],
            "San Juan": ["Barangay 29", "Barangay 30"],
            "Maria": ["Barangay 31", "Barangay 32"]
        }
    },
    "Region IX": {
        "Zamboanga del Norte": {
            "Dipolog City": ["Barangay 1", "Barangay 2"],
            "Dapitan City": ["Barangay 3", "Barangay 4"],
            "Jose Dalman": ["Barangay 5", "Barangay 6"],
            "Sergio Osmeña Sr.": ["Barangay 7", "Barangay 8"]
        },
        "Zamboanga del Sur": {
            "Pagadian City": ["Barangay 9", "Barangay 10"],
            "Molave": ["Barangay 11", "Barangay 12"],
            "Sominot": ["Barangay 13", "Barangay 14"],
            "Guipos": ["Barangay 15", "Barangay 16"]
        },
        "Zamboanga Sibugay": {
            "Iligan City": ["Barangay 17", "Barangay 18"],
            "Malangas": ["Barangay 19", "Barangay 20"],
            "Naga": ["Barangay 21", "Barangay 22"],
            "Imelda": ["Barangay 23", "Barangay 24"]
        },
        "Zamboanga City": {
            "Zamboanga City": ["Barangay 25", "Barangay 26"],
            "Baclayon": ["Barangay 27", "Barangay 28"],
            "Lapang": ["Barangay 29", "Barangay 30"],
            "Mampang": ["Barangay 31", "Barangay 32"]
        }
    },
    "Region X": {
        "Bukidnon": {
            "Malaybalay City": ["Barangay 1", "Barangay 2"],
            "Valencia City": ["Barangay 3", "Barangay 4"],
            "Maramag": ["Barangay 5", "Barangay 6"],
            "Manolo Fortich": ["Barangay 7", "Barangay 8"]
        },
        "Camiguin": {
            "Mambajao": ["Barangay 9", "Barangay 10"],
            "Guinsiliban": ["Barangay 11", "Barangay 12"],
            "Sardu": ["Barangay 13", "Barangay 14"],
            "Catarman": ["Barangay 15", "Barangay 16"]
        },
        "Lanao del Norte": {
            "Tubod": ["Barangay 17", "Barangay 18"],
            "Iligan City": ["Barangay 19", "Barangay 20"],
            "Balo-i": ["Barangay 21", "Barangay 22"],
            "Kapatagan": ["Barangay 23", "Barangay 24"]
        },
        "Misamis Occidental": {
            "Oroquieta City": ["Barangay 25", "Barangay 26"],
            "Ozamiz City": ["Barangay 27", "Barangay 28"],
            "Tangub City": ["Barangay 29", "Barangay 30"],
            "Aloran": ["Barangay 31", "Barangay 32"]
        },
        "Misamis Oriental": {
            "Cagayan de Oro City": ["Barangay 33", "Barangay 34"],
            "Gingoog City": ["Barangay 35", "Barangay 36"],
            "El Salvador City": ["Barangay 37", "Barangay 38"],
            "Villanueva": ["Barangay 39", "Barangay 40"]
        }
    },
    "Region XI": {
        "Davao del Norte": {
            "Tagum City": ["Barangay 1", "Barangay 2"],
            "Panabo City": ["Barangay 3", "Barangay 4"],
            "Samal": ["Barangay 5", "Barangay 6"],
            "Asuncion": ["Barangay 7", "Barangay 8"]
        },
        "Davao de Oro": {
            "Mabini": ["Barangay 9", "Barangay 10"],
            "Nabunturan": ["Barangay 11", "Barangay 12"],
            "Maco": ["Barangay 13", "Barangay 14"],
            "Pantukan": ["Barangay 15", "Barangay 16"]
        },
        "Davao Oriental": {
            "Mati City": ["Barangay 17", "Barangay 18"],
            "Baganga": ["Barangay 19", "Barangay 20"],
            "Caraga": ["Barangay 21", "Barangay 22"],
            "Governor Generoso": ["Barangay 23", "Barangay 24"]
        },
        "Davao City": {
            "Davao City": ["Barangay 25", "Barangay 26"],
            "Baguio District": ["Barangay 27", "Barangay 28"],
            "Poblacion District": ["Barangay 29", "Barangay 30"],
            "Tugbok District": ["Barangay 31", "Barangay 32"]
        }
    },

    "Region XII": {
        "Sarangani": {
            "Alabel": ["Barangay 1", "Barangay 2"],
            "Glan": ["Barangay 3", "Barangay 4"],
            "Maasim": ["Barangay 5", "Barangay 6"],
            "Malapatan": ["Barangay 7", "Barangay 8"]
        },
        "South Cotabato": {
            "General Santos City": ["Barangay 9", "Barangay 10"],
            "Koronadal City": ["Barangay 11", "Barangay 12"],
            "T'boli": ["Barangay 13", "Barangay 14"],
            "Lake Sebu": ["Barangay 15", "Barangay 16"]
        },
        "Sultan Kudarat": {
            "Isulan": ["Barangay 17", "Barangay 18"],
            "Tacurong City": ["Barangay 19", "Barangay 20"],
            "Columbio": ["Barangay 21", "Barangay 22"],
            "Lambayong": ["Barangay 23", "Barangay 24"]
        },
        "Cotabato": {
            "Kidapawan City": ["Barangay 25", "Barangay 26"],
            "Makilala": ["Barangay 27", "Barangay 28"],
            "Midsayap": ["Barangay 29", "Barangay 30"],
            "Pikit": ["Barangay 31", "Barangay 32"]
        }
    },
     "Region XIII": {
        "Agusan del Norte": {
            "Butuan City": ["Barangay 1", "Barangay 2"],
            "Cabadbaran City": ["Barangay 3", "Barangay 4"],
            "Las Nieves": ["Barangay 5", "Barangay 6"],
            "Jabonga": ["Barangay 7", "Barangay 8"]
        },
        "Agusan del Sur": {
            "San Francisco": ["Barangay 9", "Barangay 10"],
            "Bunawan": ["Barangay 11", "Barangay 12"],
            "Talacogon": ["Barangay 13", "Barangay 14"],
            "Trento": ["Barangay 15", "Barangay 16"]
        },
        "Surigao del Norte": {
            "Surigao City": ["Barangay 17", "Barangay 18"],
            "Bislig City": ["Barangay 19", "Barangay 20"],
            "Sison": ["Barangay 21", "Barangay 22"],
            "Placer": ["Barangay 23", "Barangay 24"]
        },
        "Surigao del Sur": {
            "Tandag City": ["Barangay 25", "Barangay 26"],
            "Bislig City": ["Barangay 27", "Barangay 28"],
            "Lianga": ["Barangay 29", "Barangay 30"],
            "Barobo": ["Barangay 31", "Barangay 32"]
        },
        "Dinagat Islands": {
            "San Jose": ["Barangay 33", "Barangay 34"],
            "Cagdianao": ["Barangay 35", "Barangay 36"],
            "Basilisa": ["Barangay 37", "Barangay 38"],
            "Dinagat": ["Barangay 39", "Barangay 40"]
        }
    },
    
    "BARMM": {
        "Basilan": {
            "Isabela City": ["Barangay 1", "Barangay 2"],
            "Lamitan City": ["Barangay 3", "Barangay 4"],
            "Maluso": ["Barangay 5", "Barangay 6"],
            "Sumisip": ["Barangay 7", "Barangay 8"]
        },
        "Lanao del Sur": {
            "Marawi City": ["Barangay 9", "Barangay 10"],
            "Lumba-Bayabao": ["Barangay 11", "Barangay 12"],
            "Balindong": ["Barangay 13", "Barangay 14"],
            "Balo-i": ["Barangay 15", "Barangay 16"]
        },
        "Maguindanao del Norte": {
            "Cotabato City": ["Barangay 17", "Barangay 18"],
            "Datu Odin Sinsuat": ["Barangay 19", "Barangay 20"],
            "Datu Saudi Ampatuan": ["Barangay 21", "Barangay 22"],
            "Sultan Kudarat": ["Barangay 23", "Barangay 24"]
        },
        "Maguindanao del Sur": {
            "Buluan": ["Barangay 25", "Barangay 26"],
            "Mamasapano": ["Barangay 27", "Barangay 28"],
            "Shariff Aguak": ["Barangay 29", "Barangay 30"],
            "Datu Salibo": ["Barangay 31", "Barangay 32"]
        },
        "Sulu": {
            "Jolo": ["Barangay 33", "Barangay 34"],
            "Maimbung": ["Barangay 35", "Barangay 36"],
            "Talipao": ["Barangay 37", "Barangay 38"],
            "Indanan": ["Barangay 39", "Barangay 40"]
        },
        "Tawi-Tawi": {
            "Bongao": ["Barangay 41", "Barangay 42"],
            "Languyan": ["Barangay 43", "Barangay 44"],
            "Sapa-Sapa": ["Barangay 45", "Barangay 46"],
            "Turtle Islands": ["Barangay 47", "Barangay 48"]
        }
    }


    

        



    // Add more regions, provinces, cities, and barangays as needed
};

function loadProvinces(region) {
    const provinceSelect = document.getElementById('province');
    provinceSelect.innerHTML = '<option value="">Select Province</option>';
    
    if (data[region]) {
        for (const province in data[region]) {
            provinceSelect.innerHTML += `<option value="${province}">${province}</option>`;
        }
    }
}

function loadCities(province) {
    const regionSelect = document.getElementById('region');
    const citySelect = document.getElementById('city');
    const selectedRegion = regionSelect.value;
    citySelect.innerHTML = '<option value="">Select City</option>';
    
    if (data[selectedRegion][province]) {
        for (const city in data[selectedRegion][province]) {
            citySelect.innerHTML += `<option value="${city}">${city}</option>`;
        }
    }
}

function loadMunicipalities(city) {
    const regionSelect = document.getElementById('region');
    const provinceSelect = document.getElementById('province');
    const barangaySelect = document.getElementById('barangay');
    const selectedRegion = regionSelect.value;
    const selectedProvince = provinceSelect.value;
    
    barangaySelect.innerHTML = '<option value="">Select barangay</option>';
    
    if (data[selectedRegion][selectedProvince][city]) {
        const barangays = data[selectedRegion][selectedProvince][city];
        for (const barangay of barangays) {
            barangaySelect.innerHTML += `<option value="${barangay}">${barangay}</option>`;
        }
    }
}
