<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Tracker</title>
    <link rel="icon" href="fevicon.webp">
    <?php
        session_start();
        if(!$_SESSION["username"]) {
            header("Location: index.php");
        }
        else {
            $conn = new mysqli("localhost", "ali", "", "WT");
            $result = $conn->query("select * from doctors;");
        }
    ?>
    <style>
        #body {
            position : fixed;
            top : 0;
            left : 0;
            height : 100vh;
            width : 100vw;
            background-color : rgb(180, 255, 244);
            display : flex;
            flex-wrap : wrap;
            justify-content : space-evenly;
        }
        .flex-items {
            padding : 50px;
            margin : 50px;
            border-radius : 25px;
            background-color : rgb(0,155,145);
            color : white;
            text-align : center;
            cursor : pointer;
        }
        .flex-items div {
            margin : 10px;
        }
        h2 {
            text-align : center;
        }
        .specialists {
            position : fixed;
            top : 0;
            left : 0;
            height : 100vh;
            width : 100vw;
            background : rgba(255,255,255,0.5) center/cover no-repeat fixed;
            background-blend-mode : overlay;
        }
    </style>
</head>
<body>
    <div id="body">
    <?php
        while($row=$result->fetch_assoc()) {
            echo "<div class='flex-items' onclick='window.location=\"doctors.php?d=".$row["doctor"]."&s=".$row["specializedin"]."\"'><div>Dr. ".$row["doctor"]."</div><div>".$row["specializedin"]."</div></div>";
        }
    ?>
    </div>
    <div id="Anesthesiologist" class="specialists" style="background-image:url('anesthesiologist.png');">
        <h2>Anesthesiologist - Dr. <?php echo $_REQUEST["d"]; ?></h2>
        <p>He is an anesthesiologist  a medical doctor who specializes in administering anesthesia, the medical treatment that keeps you from feeling pain during procedures or surgery. Anesthesiologists take care of you before, during and after your surgery.</p>
        <h3>Overview</h3>
        <h4>What is an anesthesiologist?</h4>
        <p>An anesthesiologist is a medical doctor who directs your anesthesia care, pain management and critical care before, during and after surgeries and invasive procedures.</p>
        <h4>What is anesthesia?</h4>
        <p>Anesthesia is a medical treatment that keeps you from feeling pain during procedures or surgery. The medications anesthesiologists and other healthcare providers use to block pain are called anesthetics. Different types of anesthesia work in different ways. Some anesthetic medications numb certain parts of your body, while other medications numb your brain to induce sleep for more invasive surgical procedures, like those within your head, chest or abdomen.</p>
        <p>If you're having a relatively simple procedure that covers a very small area of your body, such as a dental filling, the provider performing your procedure will often administer a local anesthetic, which only works to block pain at a certain (local) area of your body.</p>
        <h4>What does an anesthesiologist do?</h4>
        <p>Similar to your primary care doctor, your physician anesthesiologist manages all aspects of your medical care (blood pressure, diabetes, asthma and heart conditions), while administering an anesthetic that makes you or part of your body unaware of pain from the procedure being performed.</p>
        <p>Anesthesiologists help to ensure your safety when you’re undergoing surgery or an invasive procedure, making sure your body parts are well padded and protected from injury while you’re unaware of your surroundings.</p>
        <p>Anesthesiologists have important responsibilities before, during and after a surgery or procedure:</p>
        <ul>
            <li>Before surgery: Your anesthesiologist is responsible for assessing your health and test results, your fitness for the planned surgery and determining the safest anesthesia plan for you.</li>
            <li>During surgery: Your anesthesiologist monitors your vital signs during surgery, manages your medical conditions, and administers fluids, blood products and medications to support your bodily functions, such as the function of your heart, lungs and kidneys. They may work alone or with an anesthesia care team that may consist of nurse anesthetists or physician anesthesiologists in training.</li>
            <li>After surgery: Your anesthesiologist is responsible for your wellbeing after surgery while you’re recovering from the effects of anesthesia. They’re typically the healthcare provider who decides when you have recovered from the effects of anesthesia and are ready to go home or go to another room in the hospital.</li>
        </ul>
        <p>Anesthesiologists also have an important role in taking care of people who are having minor surgery or who may not need to be unconscious with a general anesthesia, such as people in labor ready to deliver a baby.</p>
        <p>They care for people after major surgery in the intensive care unit. They also help people who have serious pain from an injury or chronic pain, such as ongoing back pain, within a pain management team in the hospital or in an office setting.</p>
    </div>
    <div id="Cardiologist" class="specialists" style="background-image:url('cardiologist.png');">
        <h2>Cardiologist - Dr. <?php echo $_REQUEST["d"]; ?></h2>
        <p>A cardiologist is a medical doctor who specializes in diagnosing, treating, and preventing diseases and conditions of the heart and blood vessels.</p>
        <h3>Overview</h3>
        <h4>What is a cardiologist?</h4>
        <p>A cardiologist is a medical doctor who focuses on the cardiovascular system, which includes the heart and blood vessels.</p>
        <h4>What does a cardiologist do?</h4>
        <p>Cardiologists diagnose and treat conditions such as coronary artery disease, heart failure, arrhythmias, and congenital heart defects. They may also perform procedures such as angioplasty, implanting pacemakers, and coronary artery bypass surgery.</p>
        <h4>What are the responsibilities of a cardiologist?</h4>
        <p>Cardiologists have important responsibilities before, during, and after procedures:</p>
        <ul>
            <li>Before procedures: Cardiologists assess a patient's medical history, perform diagnostic tests such as electrocardiograms (ECGs) and echocardiograms, and determine the best treatment plan.</li>
            <li>During procedures: Cardiologists perform interventions such as catheterizations, angioplasty, and stent placements to treat heart conditions. They also monitor patients' vital signs and response to treatment during procedures.</li>
            <li>After procedures: Cardiologists oversee patients' recovery, adjust medications as needed, and provide follow-up care to prevent future heart problems.</li>
        </ul>
        <p>Cardiologists also play a crucial role in preventive care, educating patients about lifestyle changes to improve heart health and managing risk factors such as high blood pressure, cholesterol, and diabetes.</p>
    </div>
    <div id="Dentist" class="specialists" style="background-image:url('dentist.png');">
        <h2>Dentist - Dr. <?php echo $_REQUEST["d"]; ?></h2>
        <p>A dentist is a healthcare professional who specializes in diagnosing, treating, and preventing oral diseases and conditions.</p>
        <h3>Overview</h3>
        <h4>What is a dentist?</h4>
        <p>A dentist is a medical professional who focuses on oral health, including the teeth, gums, and mouth.</p>
        <h4>What does a dentist do?</h4>
        <p>Dentists perform various procedures to maintain oral health, such as cleanings, fillings, extractions, and root canals. They also provide preventive care, including dental examinations, fluoride treatments, and sealants to prevent cavities.</p>
        <h4>What are the responsibilities of a dentist?</h4>
        <p>Dentists have important responsibilities in providing comprehensive dental care:</p>
        <ul>
            <li>Preventive care: Dentists educate patients about proper oral hygiene practices, such as brushing and flossing, and perform regular dental check-ups to detect and prevent oral health issues.</li>
            <li>Diagnostic procedures: Dentists use diagnostic tools such as X-rays and examinations to identify oral diseases and conditions.</li>
            <li>Treatment: Dentists perform procedures to treat oral health problems, including cavity fillings, tooth extractions, and periodontal treatments for gum disease.</li>
            <li>Restorative dentistry: Dentists restore damaged or missing teeth using techniques such as crowns, bridges, and dental implants.</li>
            <li>Cosmetic dentistry: Dentists improve the appearance of patients' smiles through procedures such as teeth whitening, veneers, and orthodontics.</li>
        </ul>
        <p>Dentists also play a role in promoting overall health, as oral health is closely linked to systemic health conditions such as diabetes and heart disease.</p>
    </div>
    <div id="Urologist" class="specialists" style="background-image:url('urologist.png');"> 
        <h2>Urologist - Dr. <?php echo $_REQUEST["d"]; ?></h2>
        <p>A urologist is a medical doctor who specializes in diagnosing and treating diseases and disorders of the urinary tract and male reproductive system.</p>
        <h3>Overview</h3>
        <h4>What is a urologist?</h4>
        <p>A urologist is a healthcare professional who focuses on the health and function of the urinary system, including the kidneys, bladder, ureters, urethra, and male reproductive organs.</p>
        <h4>What does a urologist do?</h4>
        <p>Urologists diagnose and treat a wide range of urological conditions, including urinary tract infections, kidney stones, urinary incontinence, prostate disorders, erectile dysfunction, and infertility.</p>
        <h4>What are the responsibilities of a urologist?</h4>
        <p>Urologists have important responsibilities in providing comprehensive urological care:</p>
        <ul>
            <li>Diagnostic procedures: Urologists perform diagnostic tests such as urine analysis, imaging studies (such as ultrasound or CT scans), and cystoscopy to evaluate urinary tract problems and diagnose urological conditions.</li>
            <li>Treatment: Urologists develop individualized treatment plans for patients with urological disorders, which may include medications, lifestyle modifications, minimally invasive procedures, or surgery.</li>
            <li>Surgical procedures: Urologists perform surgical procedures to treat conditions such as kidney stones, prostate enlargement (benign prostatic hyperplasia), bladder cancer, and urinary incontinence. Common urological surgeries include prostatectomy, nephrectomy, cystectomy, and vasectomy.</li>
            <li>Men's health: Urologists provide care for male reproductive health issues, including erectile dysfunction, male infertility, and prostate disorders such as prostatitis and prostate cancer.</li>
            <li>Women's urology: Urologists also treat urological conditions that affect women, such as urinary incontinence, pelvic organ prolapse, and interstitial cystitis.</li>
            <li>Pediatric urology: Some urologists specialize in pediatric urology and provide care for children with congenital urinary tract abnormalities, bedwetting (enuresis), and other pediatric urological conditions.</li>
        </ul>
        <p>Urologists often collaborate with other medical specialists, such as oncologists, nephrologists, gynecologists, and primary care physicians, to provide comprehensive care for patients with complex urological conditions.</p>
    </div>
    <div id="Dermatologist" class="specialists" style="background-image:url('dermotologist.png');">
        <h2>Dermatologist - Dr. <?php echo $_REQUEST["d"]; ?></h2>
        <p>A dermatologist is a medical doctor who specializes in diagnosing and treating diseases and conditions related to the skin, hair, and nails.</p>
        <h3>Overview</h3>
        <h4>What is a dermatologist?</h4>
        <p>A dermatologist is a healthcare professional who focuses on the health and appearance of the skin, as well as conditions affecting the hair and nails.</p>
        <h4>What does a dermatologist do?</h4>
        <p>Dermatologists diagnose and treat a wide range of skin conditions, including acne, eczema, psoriasis, skin cancer, and infections. They also perform procedures such as skin biopsies, mole removals, and cosmetic treatments.</p>
        <h4>What are the responsibilities of a dermatologist?</h4>
        <p>Dermatologists have important responsibilities in providing comprehensive skin care:</p>
        <ul>
            <li>Diagnostic procedures: Dermatologists examine patients' skin, hair, and nails to diagnose conditions using visual inspections, dermoscopy, and other diagnostic tools.</li>
            <li>Treatment: Dermatologists prescribe medications, topical treatments, and procedures to treat various skin conditions, such as oral or topical medications for acne, topical steroids for eczema, and surgical excision for skin cancer.</li>
            <li>Procedures: Dermatologists perform procedures such as biopsies, cryotherapy, laser therapy, and cosmetic treatments like Botox injections and dermal fillers.</li>
            <li>Preventive care: Dermatologists educate patients about sun protection, skin cancer prevention, and proper skincare routines to maintain healthy skin.</li>
            <li>Screening: Dermatologists conduct skin cancer screenings to detect early signs of melanoma and other skin cancers.</li>
        </ul>
        <p>Dermatologists also collaborate with other medical specialties, such as oncology and rheumatology, when skin conditions are associated with systemic diseases.</p>
    </div>
    <div id="Eye Specialist" class="specialists" style="background-image:url('eyespecialist.png');">
        <h2>Eye Specialist - Dr. <?php echo $_REQUEST["d"]; ?></h2>
        <p>An eye specialist, also known as an ophthalmologist, is a medical doctor who specializes in diagnosing and treating diseases and conditions related to the eyes and vision.</p>
        <h3>Overview</h3>
        <h4>What is an eye specialist?</h4>
        <p>An eye specialist is a healthcare professional who focuses on the health and function of the eyes, including diagnosing and treating eye diseases, prescribing corrective lenses, and performing eye surgery.</p>
        <h4>What does an eye specialist do?</h4>
        <p>Eye specialists diagnose and treat a wide range of eye conditions, including refractive errors (such as nearsightedness and farsightedness), cataracts, glaucoma, macular degeneration, and diabetic retinopathy. They also perform procedures such as cataract surgery, laser eye surgery (LASIK), and corneal transplants.</p>
        <h4>What are the responsibilities of an eye specialist?</h4>
        <p>Eye specialists have important responsibilities in providing comprehensive eye care:</p>
        <ul>
            <li>Diagnostic procedures: Eye specialists perform comprehensive eye examinations to assess vision and screen for eye diseases using tools such as visual acuity tests, tonometry, and ophthalmoscopy.</li>
            <li>Treatment: Eye specialists prescribe medications, corrective lenses, and other treatments to manage eye conditions and improve vision.</li>
            <li>Surgery: Eye specialists perform surgical procedures to treat conditions such as cataracts, glaucoma, and retinal disorders, as well as to correct refractive errors.</li>
            <li>Preventive care: Eye specialists educate patients about eye health, provide guidance on proper eye hygiene and protection, and recommend regular eye exams to maintain optimal vision and prevent eye diseases.</li>
            <li>Management of systemic conditions: Eye specialists collaborate with other medical specialists to manage eye complications associated with systemic diseases such as diabetes and hypertension.</li>
        </ul>
        <p>Eye specialists also play a role in research and innovation to advance the field of ophthalmology and improve patient care.</p>
    </div>
    <div id="Gynecologist" class="specialists" style="background-image:url('gynaecologist.png');">
        <h2>Gynecologist - Dr. <?php echo $_REQUEST["d"]; ?></h2>
        <p>A gynecologist is a medical doctor who specializes in women's reproductive health, including the female reproductive system and related disorders.</p>
        <h3>Overview</h3>
        <h4>What is a gynecologist?</h4>
        <p>A gynecologist is a healthcare professional who focuses on the diagnosis and treatment of conditions affecting the female reproductive organs, including the uterus, ovaries, fallopian tubes, and vagina.</p>
        <h4>What does a gynecologist do?</h4>
        <p>Gynecologists provide a wide range of services to women of all ages, including routine gynecological exams, prenatal care, family planning services, and treatment for reproductive health issues.</p>
        <h4>What are the responsibilities of a gynecologist?</h4>
        <p>Gynecologists have important responsibilities in providing comprehensive reproductive healthcare:</p>
        <ul>
            <li>Annual exams: Gynecologists perform routine pelvic exams, Pap smears, and breast exams to screen for cervical cancer, sexually transmitted infections, and other reproductive health issues.</li>
            <li>Contraceptive counseling: Gynecologists provide information and guidance on contraception options, including birth control pills, intrauterine devices (IUDs), and contraceptive implants.</li>
            <li>Prenatal care: Gynecologists provide care and support to pregnant women throughout all stages of pregnancy, including prenatal screenings, monitoring fetal development, and managing pregnancy-related complications.</li>
            <li>Menstrual disorders: Gynecologists diagnose and treat conditions such as irregular periods, heavy bleeding, and menstrual cramps.</li>
            <li>Reproductive disorders: Gynecologists diagnose and treat conditions such as polycystic ovary syndrome (PCOS), endometriosis, ovarian cysts, and fibroids.</li>
            <li>Menopausal care: Gynecologists provide support and treatment for women experiencing menopausal symptoms, such as hot flashes, vaginal dryness, and mood changes.</li>
        </ul>
        <p>Gynecologists also perform surgical procedures such as hysterectomies, tubal ligations, and ovarian cyst removals to treat gynecological conditions when necessary.</p>
    </div>
    <div id="Neurologist" class="specialists" style="background-image:url('neurologist.png');">
        <h2>Neurologist - Dr. <?php echo $_REQUEST["d"]; ?></h2>
        <p>A neurologist is a medical doctor who specializes in diagnosing and treating disorders of the nervous system, including the brain, spinal cord, nerves, and muscles.</p>
        <h3>Overview</h3>
        <h4>What is a neurologist?</h4>
        <p>A neurologist is a healthcare professional who focuses on the diagnosis and treatment of conditions affecting the nervous system, which controls all functions of the body.</p>
        <h4>What does a neurologist do?</h4>
        <p>Neurologists diagnose and treat a wide range of neurological disorders, including stroke, epilepsy, multiple sclerosis, Parkinson's disease, Alzheimer's disease, and headaches.</p>
        <h4>What are the responsibilities of a neurologist?</h4>
        <p>Neurologists have important responsibilities in providing comprehensive neurological care:</p>
        <ul>
            <li>Diagnostic procedures: Neurologists perform neurological examinations, review medical history, and order diagnostic tests such as MRI, CT scans, and electroencephalograms (EEGs) to diagnose neurological conditions.</li>
            <li>Treatment: Neurologists develop individualized treatment plans for patients with neurological disorders, which may include medication management, physical therapy, occupational therapy, speech therapy, and lifestyle modifications.</li>
            <li>Emergency care: Neurologists provide acute care for patients experiencing neurological emergencies such as stroke, traumatic brain injury, and seizures.</li>
            <li>Chronic disease management: Neurologists monitor and manage chronic neurological conditions to optimize patient function and quality of life.</li>
            <li>Research and innovation: Neurologists contribute to scientific research and clinical trials to advance understanding and treatment of neurological disorders.</li>
        </ul>
        <p>Neurologists may also collaborate with other medical specialists, such as neurosurgeons, neuroradiologists, and rehabilitation specialists, to provide comprehensive care for patients with complex neurological conditions.</p>
    </div>
    <div id="Psychiatrist" class="specialists" style="background-image:url('psychiatrist.png');">
        <h2>Psychiatrist - Dr. <?php echo $_REQUEST["d"]; ?></h2>
        <p>A psychiatrist is a medical doctor who specializes in diagnosing and treating mental health disorders, including mood disorders, anxiety disorders, psychotic disorders, and substance use disorders.</p>
        <h3>Overview</h3>
        <h4>What is a psychiatrist?</h4>
        <p>A psychiatrist is a healthcare professional who focuses on the diagnosis, treatment, and prevention of mental illness and emotional disorders.</p>
        <h4>What does a psychiatrist do?</h4>
        <p>Psychiatrists assess patients' mental health through interviews, observation, and psychological testing. They diagnose mental health conditions and develop treatment plans, which may include psychotherapy, medication management, and other interventions.</p>
        <h4>What are the responsibilities of a psychiatrist?</h4>
        <p>Psychiatrists have important responsibilities in providing comprehensive mental health care:</p>
        <ul>
            <li>Diagnostic evaluation: Psychiatrists conduct thorough assessments to diagnose mental health disorders, taking into account patients' symptoms, medical history, and psychosocial factors.</li>
            <li>Treatment planning: Psychiatrists develop individualized treatment plans for patients, which may include psychotherapy (such as cognitive-behavioral therapy or psychodynamic therapy), medication management, and lifestyle modifications.</li>
            <li>Medication management: Psychiatrists prescribe and monitor medications to manage psychiatric symptoms and improve patients' overall functioning.</li>
            <li>Crisis intervention: Psychiatrists provide acute care for patients experiencing psychiatric crises, such as suicidal ideation, severe mood disturbances, or psychotic episodes.</li>
            <li>Collaboration with other providers: Psychiatrists work collaboratively with other mental health professionals, such as psychologists, social workers, and psychiatric nurses, to coordinate care and support patients' treatment goals.</li>
            <li>Education and advocacy: Psychiatrists educate patients and their families about mental health conditions, treatment options, and strategies for coping with symptoms. They also advocate for policies and resources to improve access to mental health care.</li>
        </ul>
        <p>Psychiatrists may specialize in specific areas of psychiatry, such as child and adolescent psychiatry, geriatric psychiatry, addiction psychiatry, or forensic psychiatry, depending on their interests and training.</p>
    </div>
</body>
    <script>
        for (x of document.body.children) {
            x.style.display="none";
        }
    <?php
        if($_REQUEST["d"]) {
            echo "document.getElementById('".$_REQUEST["s"]."').style.display='block';";
        } else {
            echo "document.getElementById('body').style.display='flex';";
        }
    ?>
    </script>
</html>