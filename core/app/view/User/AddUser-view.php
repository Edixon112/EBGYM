<div class="col-md-12 col-lg-12">
	<div class="card mg-b-20">
		<div class="card-header">
			<h4 class="card-header-title">
				Registre sus Datos
			</h4>
			<div class="card-header-btn">
				<a href="#" data-toggle="collapse" class="btn card-collapse" data-target="#collapse7" aria-expanded="true"><i class="ion-ios-arrow-down"></i></a>
				<a href="#" data-toggle="refresh" class="btn card-refresh"><i class="ion-android-refresh"></i></a>
				<a href="#" data-toggle="expand" class="btn card-expand"><i class="ion-android-expand"></i></a>
				<a href="#" data-toggle="remove" class="btn card-remove"><i class="ion-android-close"></i></a>
			</div>
		</div>
		<div class="card-body collapse show" id="collapse7">
			<form class="needs-validation" action="index.php?action=User/AddUser" method="post" novalidate>
				<div class="form-row">

					<!--info oculta-->
					<!--input type="text" style="display: none" id="activo" name="activo" value="" readonly="true"  required /-->

					<div class="col-md-6 mb-3">
						<label for="nombre">Nombre</label>
						<input onkeyup="javascript:this.value=this.value.toUpperCase();" type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingrese su nombre" value=""  onkeypress="return ValidacionLetra(event);" required>
						<div class="valid-feedback">
							Nombre valido
						</div>
						<div class="invalid-feedback">
							Por favor ingrese un nombre
						</div>
					</div>

					<div class="col-md-6 mb-3">
						<label for="apellido">Apellido</label>
						<input onkeyup="javascript:this.value=this.value.toUpperCase();" type="text" class="form-control" id="apellido" name="apellido" placeholder="ingrese su apellido" value=""  onkeypress="return ValidacionLetra(event);" required>
						<div class="valid-feedback">
							Apellido valido
						</div>
						<div class="invalid-feedback">
							Por favor ingrese un apellido
						</div>
					</div>

					<div class="col-md-6 mb-3">
						<label for="cedula">Numero de Cedula</label>
						<input type="text" class="form-control" id="cedula" name="cedula" placeholder="ingrese su cedula" value="" onkeypress="return ValidacionNumero(event);" required>
						<div class="valid-feedback">
							Numero de cedula valido
						</div>
						<div class="invalid-feedback">
							Por favor ingrese un numero cedula
						</div>
					</div>

					<div class="col-md-6 mb-3">
						<label for="telefono">telefono</label>
						<input type="text" class="form-control" id="telefono" name="telefono" placeholder="ingrese su telefono" value="" onkeypress="return ValidacionNumero(event);" required>
						<div class="valid-feedback">
							Numero valido
						</div>
						<div class="invalid-feedback">
							Por favor ingrese un numero
						</div>
					</div>

					<div class="col-md-6 mb-3">
						<p>selecione Rol</p>
						<div class="input-group mb-6">
							<select class="selectpicker form-control" data-hide-disabled="true" data-live-search="true" name="rol" id="rol" id="inputGroupSelect01" required>
								<option> </option>
								<?php
								$Rol = RolData::getAll();
								foreach ($Rol as $Rol) {
								?>
									<option value="<?php echo $Rol->id; ?>"><?php echo $Rol->nombre; ?></option>
								<?php } ?>
							</select>
						</div>
					</div>

					<div class="col-md-6 mb-3">
						<p>User</p>
						<div class="input-group mb-3">
							<div class="input-group-prepend">
								<span class="input-group-text" id="basic-addon1">UserName</span>
							</div>
							<input onkeyup="javascript:this.value=this.value.toUpperCase();" type="text" class="form-control" placeholder="User" name="username" id="username" aria-label="User" aria-describedby="basic-addon1" required>
						</div>

					</div>


					<div class="col-md-6 mb-3">
						<p>Password</p>
						<div class="input-group mb-3">
							<div class="input-group-prepend">
								<span class="input-group-text" id="basic-addon1">Password</span>
							</div>
							<input type="Password" class="form-control" placeholder="Password" name="password1" id="password1" aria-label="Password" aria-describedby="basic-addon1" required>
						</div>

					</div>

					<div class="col-md-6 mb-3">
						<p>Password</p>
						<div class="input-group mb-3">
							<div class="input-group-prepend">
								<span class="input-group-text" id="basic-addon1">Confirm Password</span>
							</div>
							<input type="Password" class="form-control" placeholder="Password" name="password2" id="password2" aria-label="Password" aria-describedby="basic-addon1" required>
						</div>

					</div>

				</div>
				<button class="btn btn-custom-primary" type="submit">Enviar</button>
			</form>
		</div>
	</div>
</div>