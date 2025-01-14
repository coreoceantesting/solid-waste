<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panvel Municipal Corporation</title>
    <style>
        body {
            font-family: 'freeserif', 'normal';;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        .container {
            width: 90%;
            margin: 0 auto;
            padding: 20px;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            margin-top: 30px;
        }

        .header-section {
            border-bottom: 3px solid black;
            padding-bottom: 10px;
            margin-bottom: 20px;
            text-align: center;
        }

        .logo {
            max-width: 1600px; /* Increased size */
            width: 100%; /* Ensures responsive resizing */
        }
        .main-title {
            font-weight: bold;
            font-size: 1.8rem;
            color: black;
        }

        .address {
            font-weight: bold;
            font-size: 1.2rem;
        }

        .divider {
            border-top: 2px solid black;
            margin: 10px 0;
        }

        .contact-info {
            display: flex;
            justify-content: space-between;
            margin-top: 10px;
        }

        .contact-info .left-column {
            width: 48%;
        }

        .contact-info .right-column {
            width: 48%;
            text-align: right;
        }

        .contact-info h6, .contact-info p {
            margin: 5px 0;
        }

        .square-box {
            display: block;
            border: 1px solid black;
            padding: 10px;
            margin: 10px 0;
            width: 100%;
            text-align: left;
            min-height: 60px;
            box-sizing: border-box;
        }

        .custom-hr {
            border-top: 2px solid black;
            margin: 15px 0;
            width: 100%;
        }

        .header-section .logo-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .header-section .logo-container img {
            width: 100px;
        }

        .bold-text {
            font-weight: bold;
        }

        .normal-text {
            font-weight: normal;
        }

        .content-box {
            margin-top: 20px;
        }

        .content-box p {
            margin: 10px 0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table, th, td {
            border: 1px solid black;
        }

        th, td {
            padding: 8px;
            text-align: center;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>

    <div class="container">
        <!-- Header Section -->
        <div class="header-section">
            <div class="logo-container">
                <div>
                    <img src="{{ public_path('admin\images\PMC LOGO.png') }}" alt="Left Logo" class="logo">
                </div>
                <div style="text-align: center;">
                    <h2 class="main-title">पनवेल महानगरपालिका</h2>
                    <p class="address">ता. पनवेल, जिल्हा - रायगड, पनवेल - 410206.</p>
                    <div class="divider"></div>
                </div>
                <div style="text-align: right;">
                    <img src="{{ public_path('/admin/images/PMC LOGO.png') }}" alt="Right Logo" class="logo">
                </div>
            </div>
        </div>

        <!-- Contact Details -->
        <div class="contact-info">
            <div class="left-column">
                <p>दूरध्वनी कार्यालय : 022-27458040,41,42</p>
                <p>फॅक्स नं.: 022-27452333</p>
                <p>उपायुक्त कार्यालय : 022-27455751</p>
                <p>आयुक्त कार्यालय : 022- 27452339</p>
                <p>ईमेल : panvelcorporation@gmail.com</p>
                <p>वेबसाईट: www.panvelcorporation.com</p>
            </div>
            {{-- <div class="right-column">
                <p>आयुक्त</p>
                <br><br>
                <p>वेबसाईट:</p>
            </div> --}}
        </div>

        <!-- Custom Line Break -->
        <hr class="custom-hr">

        <!-- Square Box with Reference Details -->
        <div class="square-box">
            <p>पमपा/ परवाना/4824/प्र.क्र.61/जा.क्र.              /2024</p>
            <p>दिनांक /12/2024</p>
        </div>

        <!-- Content Section -->
        <div class="content-box">
            <p class="bold-text">प्रति,</p>
            <p class="bold-text">श्री गाना जी सामाजिक एवं धार्मिक कल्याण संस्थान (समिती),</p>
            <p class="bold-text">शॉप नं डी 10, प्लॉट नं 1 व 2, अहिंसा अपार्टमेंट, सेक्टर 18, कामोठे.</p>

            <p class="">विषय :- तात्पुरत्या स्वरुपात जाहिरात फलक उभारणेकामी परवानगी मिळणेबाबात.</p>
            <p class="">संदर्भ :- आपला दिनांक 18/12/2024 रोजीचा अर्ज.</p>

            <p class="normal-text">आपल्या उपरोक्त संदर्भिय अर्जानुसार दिनांक 22/12/2024 ते दिनांक 26/12/2024 रोजीपर्यंत या कालावधीकरीता तात्पुरत्या बॅनर करिता जाहिरात कर व प्रशासकीय शुल्क / रक्कम रु. 4,500/- पावती क्रमांक. F104/8262 दि. 19/12/2024 अन्वये महापालिकेत भरणा केलेले आहे. त्यानुसार खालील अटी व शर्ती नुसार आपणास खालील नमूद केलेल्या ठिकाणी तात्पुरते बॅनर या सोबत जोडलेल्या यादीतील ठिकाणी लावण्यास या पत्रान्वये देण्यात येत आहे.</p>

            <ol>
                <li>बॅनर हे अर्जात नमूद केलेल्या ठिकाणीच लावावयाचे आहेत.</li>
                <li>ना हरकत दाखला दिल्यानंतर आपण अर्जात नमूद केल्याप्रमाणे बॅनर लावावयाच्या आहेत. बॅनर मध्ये अश्लिल चित्र लावता येणार नाहीत. तसे केल्यास बॅनर काढून टाकण्याबाबत कार्यवाही केली जाईल, तसेच दंडात्मक शुल्क आकारण्यात येईल.</li>
                <li>आपण लावणार असलेल्या बॅनर इत्यादी वर या कार्यालयाचा परवानी क्रमांक व मुदत लिहावी.</li>
                <li>परवनागी मिळालेनंतर लावण्यात येणाऱ्या तात्पुरत्या बॅनर्स सुरक्षित व सुस्थितीत ठेवण्याची जबाबदारी सर्वस्वी परवानाधाकाची राहील.</li>
                <li>तात्पुरत्या बॅनर्सवर नमुद केलेल्या मजकूरामुळे कोणाच्याही भावना दुखावणार नाहीत. याची जबाबदारी परवानाधारकाची राहील.</li>
                <li>आवश्यक असणाऱ्या शासनाच्या परवानग्या घेणेची सर्वस्वी जबाबदारी आपणावर राहील.</li>
                <li>सदरचा कार्यक्रम झाल्यानंतर / मुदत संपल्यानंतर सर्व बॅनर्स आपण स्वत: काढून घ्यावेत.</li>
                <li>छपाई करण्यात आलेल्या बॅनर / जाहिरात फलकावर मुद्रण कर्त्याचे नाव व मोबाईल नंबर नमुद करणे आवश्यक आहे.</li>
            </ol>

            <p class="bold-text">9. प्रत्येक बॅनरवर महानगरपालिकेची परवानगी क्रंमाक, दिनांक, बॅनर्सच्या उजव्या कोपऱ्यात ठळक अक्षरात छापण्यात यावा. अन्यथा बॅनर अनाधिकृत असल्याचे समजुन मालमत्ता विरुपण कायदा 1995, मा. उच्च न्यायालय यांचे आदेशान्वये व महानगरपालिका अधिनियमानुसार कायदेशीर कार्यवाही करणेंत येईल याची नोंद घ्यावी.</p>
            <p class="bold-text">10. सदरचे बॅनर्स अर्जाद नमुद केलेल्या खाजगी ठिकाणीच लावावेत. स्थळ बदलुन बॅनर्स लावल्याचे आढळल्यास पूर्वसुचना न देता कारवाई करण्यात येईल.</p>

            <p class="normal-text">11. कोणताही वाद उपस्थित झाल्यास महानगरपालिकेचा निर्णय अंतिम राहील.</p>
        </div>

        <!-- Table Section -->
        <div class="content-box">
            <table>
                <thead>
                    <tr>
                        <th>अ. क्र.</th>
                        <th>जाहिरात फलक/ बॅनर लावणेचे ठिकाण</th>
                        <th>एकुण जाहिरात फलक</th>
                        <th>साईज
                            (चौ. फु.)
                            </th>
                        <th>एकुण दिवस</th>
                        <th>जाहिरात दर (प्रति. चौ. फु प्रतिदिन)</th>
                        <th>एकुण रक्कम</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>कामोठे प्रवेश अरीवली स्वीट से. 06 ए. रिक्षा स्टैंड जवळ</td>
                        <td>01</td>
                        <td>2 X 3</td>
                        <td>5</td>
                        <td>15/-</td>
                        <td>450/-</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>शिवसेना शाखेजवळ से. 36, कामोठे.</td>
                        <td>01</td>
                        <td>2 X 3</td>
                        <td>5</td>
                        <td>15/-</td>
                        <td>450/-</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <p style="font-weight: bold; color: black; margin-top: 20px;">
            परवानगी क्रमांक           <br>   दिनांक 22/12/2024 ते दिनांक 26/12/2024 रोजीपर्यंत
        </p>

        <p style="font-weight: bold; color: black; margin-top: 20px;">
            (सदाशिव कवठे)<br>
            अधिक्षक,<br>
            परवाना विभाग<br>
            पनवेल महानगरपालिका
        </p>

    </div>


</body>
</html>
