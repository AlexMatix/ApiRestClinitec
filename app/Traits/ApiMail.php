<?php 
	
namespace App\Traits;

use App\Mail\ServiceEmail;
use Illuminate\Support\Facades\Mail;

	trait ApiMail{


		public function MailSuscripcion($DatosUser, $DatosSuscipcion){

			$data = array(
					'DatosUser'       => $DatosUser,
                    'DatosSuscipcion' => $DatosSuscipcion
				);

    		Mail::to($DatosUser->email)->send(new ServiceEmail($data));
		}  

		public function MailMedicos($DatosUser, $DatosMedico){

			$data = array(
					'Nombre' => $DatosMedico->Nombre
				);

    		Mail::to($DatosUser->email)->send(new ServiceEmail($data));
		}  

	}
