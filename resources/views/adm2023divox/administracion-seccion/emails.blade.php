@extends('adm2023divox.layouts.app')



@section('content')

<style type="text/css">
    
    button {

        background-color: transparent;
        border: none;
    }

    a {

        text-decoration: none;
    }

</style>



               <div class="divbotonatras">
                <a href="https://emmu.edusistema.com.ar/adm2023divox/administracion-seccion">
                    <span class=" botonatras material-icons2">
                      arrow_back_ios_new
                    </span>
                  </a>
               </div>   


    <div class="container-fluid"style="max-width: 1300px;">

        <h1 class="tituloseccion">EMAILS/CUENTAS INSTITUCIONALES</h1>


<div class="table-responsive-sm"  style="margin-top: 2rem;" >		
					<table class="table table-bordered " style="justify-content: center; text-align: center;">
					  <thead style="color: white; background-color: #1d1d1d; ">
					    <tr>
					      <th scope="col">ACCESO A:</th>
					      <th scope="col">EMAIL / USUARIO</th>
					      <th scope="col">CONTRASEÑA</th>
					      <th scope="col">FUNCION</th>

					    </tr>
					  </thead>

					  <tbody style="background-color: #fdfdfd;" >


					    <tr>
					      <td>Mail Documentos</td>
					      <td>emmu3fdocumentos@gmail.com</td>
					      <td>contraseña administrativa</td>
					      <td>Documentos modificables en Drive</td>
					    </tr>


					    <tr>
					      <td>Mail Biblioteca</td>
					      <td>emmu3fbiblioteca@gmail.com</td>
					      <td>contraseña administrativa</td>
					      <td>Biblioteca Virtual en Drive</td>
					    </tr>


					    <tr>
					      <td>Mail Formularios</td>
					      <td>emmu3fformularios@gmail.com</td>
					      <td>contraseña administrativa</td>
					      <td>Todos los formularios de Google Forms</td>
					    </tr>


					    <tr>
					      <td>Mail Administración</td>
					      <td>emmu3fadm@gmail.com</td>
					      <td>contraseña administrativa</td>
					      <td>Acceso Mail Administración</td>
					    </tr>


					    <tr>
					      <td>Mail Dirección</td>
					      <td>emmu3fdireccion@gmail.com</td>
					      <td>contraseña de Gabi</td>
					      <td>Acceso Mail Dirección</td>
					    </tr>


					  </tbody>

					</table>
				</div>	




  <div class="container-fluid" style="margin-top: 2rem;">



    </div>
@endsection
	