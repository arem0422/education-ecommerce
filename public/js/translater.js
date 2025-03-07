$('#selectLanguageDropdown').localizationTool({
    'defaultLanguage' : 'en_GB', /* (optional) although must be defined if you don't want en_GB */
    'showFlag': true,            /* (optional) show/hide the flag */
    'showCountry': true,         /* (optional) show/hide the country name */
    'showLanguage': true,        /* (optional) show/hide the country language */
    'languages' : {              /* (optional) define **ADDITIONAL** custom languages */
        'italian' : {
            'country': 'Italy',
            'language' : 'Italian',
            'countryTranslated': 'Italia',
            'languageTranslated': 'Italiano',
            'flag' : {
                'url' : 'http://upload.wikimedia.org/wikipedia/commons/f/fb/Farm-Fresh_italy.png', /* url of flag image */
                'class' : 'italian-flag' /* (optional) class to assign to the flag (e.g., for css styling) */
            }
        },
        'barletta-dialect' : {
            'country': 'Barletta',
            'language' : 'Barlettano',
            'countryTranslated': 'Barlett',
            'languageTranslated': "Barlett'n",
            'flag': {
                'url' : 'http://upload.wikimedia.org/wikipedia/commons/2/20/Flag_of_Barletta.png'
            }
        }
    },
    /*
     * Translate your strings below
     */
    'strings' : {
        /*
         * You can specify the text string to translate directly...
         */
        'Get started with jquery.localizationTool.js' : {
            'italian' : 'Inizia ad usare jquery.localizationTool.js',
            'barletta-dialect' : 'Accumminz a yuse` jquery.localizationTool.js',
            'jp_JP' : '始める jquery.localizationTool.js',
            'ar_TN' : 'تبدأ مع jQuery.localizationTool.js'
        },
        /*
         * You can also specify elements by selector, by using the notation
         * element:<element-name> OR id:<element-id> OR class:<class-name>
         */
        'element:h2' : {
            'italian' : 'visualizza il sorgente per una guida passo passo',
            'barletta-dialect' : "veit u cudc sorgind c ve truinn na gueida vlo'c",
            'jp_JP' : 'ステップバイステップガイドを参照してソースを表示',
            'ar_TN' : 'عرض المصدر لرؤية دليل خطوة بخطوة'
        },
        /*
         * Example with id. NOTE: ids have priority over any other
         * selector in the translation.
         */
        'id:welcomeText': {
            'italian' : 'Benvenuto! il menu a discesa dovrebbe coprire questo testo!',
            /* NOTE: you can actually use HTML in the translated text! */
            'barletta-dialect' : 'Benvenout! u menu <b>va</b> cupr&iacute; st&iacute; par&oacute;l',
            'jp_JP' : 'ようこそ！ドロップダウンには、このテキストの上に行く必要があります！',
            'ar_TN' : 'أهلا وسهلا! القائمة المنسدلة يجب ان تذهب فوق هذا النص!'
        },
        /*
         * Example with class. NOTE: classes have precedence on
         * element selectors and free-form text during the
         * translation!
         */
        'class:subsubtitle' : {
            'italian' : 'dovrebbe essere abbastanza semplice',
            'barletta-dialect' : "va jiss f&eacute;cl f&eacute;cl",
            'jp_JP' : 'うまくいけば、十分に簡単であるべき',
            'ar_TN' : '(نأمل أن يكون بسيطا بما فيه الكفاية)'
        },
        /*
         * You can now translate attributes. The notation is like
         * <attribute-name>::<id/class/element>:<name>
         */
        'placeholder::element:input' : {
            'italian' : 'esempio segnaposto',
            'barletta-dialect' : "n'esimpj du signapust",
            'jp_JP' : 'サンプルプレースホルダー',
            'ar_TN' : 'نائب عينة'
        }
    }
});
