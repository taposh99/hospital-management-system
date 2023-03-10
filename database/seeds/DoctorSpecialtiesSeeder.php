<?php

use Illuminate\Database\Seeder;

class DoctorSpecialtiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        // \DB::table('doctor_specialty')->truncate();

		\DB::table('doctor_specialty')->insert([
            ['id' => 1, 'specialty_name' => 'Anesthesia' ],
			['id' => 2, 'specialty_name' => 'Cardiology (Heart, Cardiac Surgery, Cardiovascular, Hypertension, Blood Pressure)' ],
			['id' => 3, 'specialty_name' => 'Colorectal Surgery (Surgery of Anal Canal, Rectum, etc.)' ],
			['id' => 4, 'specialty_name' => 'Dentistry (Dental, Orthodontics, Maxillofacial Surgery, Scaling)' ],
			['id' => 5, 'specialty_name' => 'Dermatology (Skin, Venereology, Sexual, Hair, Allergy)' ],
			['id' => 6, 'specialty_name' => 'Endocrinology (Diabetes, Hormones, Thyroid, etc.)' ],
			['id' => 7, 'specialty_name' => 'ENT (Ear, Nose & Throat, Otorhinolaryngology)' ],
			['id' => 8, 'specialty_name' => 'Gastroenterology (Stomach, Pancreas and Intestine)' ],
			['id' => 9, 'specialty_name' => 'General Physician (All or any common diseases and health issues)' ],
			['id' => 10, 'specialty_name' => 'General Surgery (Incision, Operation)' ],
			['id' => 11, 'specialty_name' => 'Gynaecologic Oncology (Cancer of Female Reproductive System)' ],
			['id' => 12, 'specialty_name' => 'Gynaecology and Obstetrics (Pregnancy, Menstrual, Uterus, Female)' ],
			['id' => 13, 'specialty_name' => 'Haematology (Blood related diseases)' ],
			['id' => 14, 'specialty_name' => 'Hepato-Biliary- Pancreatic Surgery' ],
			['id' => 15, 'specialty_name' => 'Hepatology (Liver, Gallbladder, Biliary system)' ],
			['id' => 16, 'specialty_name' => 'Infectious Diseases' ],
			['id' => 17, 'specialty_name' => 'Infertility' ],
			['id' => 18, 'specialty_name' => 'Medicine (All Diseases of Adults)' ],
			['id' => 19, 'specialty_name' => 'Neonatology (New Born Issues)' ],
			['id' => 20, 'specialty_name' => 'Nephrology (Kidney, Ureter, Urinary Bladder)' ],
			['id' => 21, 'specialty_name' => 'Neuromedicine (Brain, Spinal Cord, Nerve)' ],
			['id' => 22, 'specialty_name' => 'Neurosurgery (Surgery of Brain, Spinal Cord and Nerve)' ],
			['id' => 23, 'specialty_name' => 'Nutritionist (Food, Diet, Weight Management)' ],
			['id' => 24, 'specialty_name' => 'Oncology (Cancer)' ],
			['id' => 25, 'specialty_name' => 'Ophthalmology (Eye, Vision, Cataracts, etc.)' ],
			['id' => 26, 'specialty_name' => 'Orthopaedics (Bone, Joint, Fractures)' ],
			['id' => 27, 'specialty_name' => 'Other Speciality (not mentioned in the list)' ],
			['id' => 28, 'specialty_name' => 'Paediatric Surgery (Surgery for Children)' ],
			['id' => 29, 'specialty_name' => 'Paediatrics (Child or Infant any disease)' ],
			['id' => 30, 'specialty_name' => 'Pain Management' ],
			['id' => 31, 'specialty_name' => 'Physical Medicine (Paralysis, Pain Management)' ],
			['id' => 32, 'specialty_name' => 'Physiotherapy' ],
			['id' => 33, 'specialty_name' => 'Plastic Surgery, Reconstruction or Cosmetic Surgery' ],
			['id' => 34, 'specialty_name' => 'Psychiatry (Mental Health, Drug Abuse, Depression, etc.)' ],
			['id' => 35, 'specialty_name' => 'Respiratory Medicine (Pulmonary, Lung Diseases, Bronchitis etc.)' ],
			['id' => 36, 'specialty_name' => 'Rheumatology (Arthritis, Joint, Soft Tissue problems)' ],
			['id' => 37, 'specialty_name' => 'Sex Specialist(Venereology)' ],
			['id' => 38, 'specialty_name' => 'Speech and Language Therapy' ],
			['id' => 39, 'specialty_name' => 'Thoracic Surgery (Surgery in Chest, Lung, etc.)' ],
			['id' => 40, 'specialty_name' => 'Urology (Surgery for Kidney, Ureter or Urinary Bladder)' ],
			['id' => 41, 'specialty_name' => 'Vascular Surgery (e.g. Surgery of Blood Vessels)' ]

        ]);
    }
}
