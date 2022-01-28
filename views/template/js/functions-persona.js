
async function getPersona(){
	document.querySelector("#tblBodyPersonas").innerHTML = "";
	try{
		let resp = await fetch(base_url+"controllers/Persona.php?op=listregistros");
		json = await resp.json();
		if(json.status){
			let data = json.data;
			data.forEach((item) =>{
				let newtr = document.createElement("tr");
				newtr.id = "row_"+item.idpersona;
				newtr.innerHTML = `<tr>
								      <th scope="row">${item.idpersona}</th>
								      <td>${item.nombre}</td>
								      <td>${item.apellido}</td>
								      <td>${item.telefono}</td>
								      <td>${item.email}</td>
								      <td>${item.options}</td>`;
				document.querySelector("#tblBodyPersonas").appendChild(newtr);
			});
		}

	}catch(err){
		console.log("Ocurrio un error: "+err);
	}
}
if(document.querySelector("#tblBodyPersonas")){
	getPersona();
}

if(document.querySelector("#frmRestro")){
	let frmRegistro = document.querySelector("#frmRestro");
	frmRegistro.onsubmit = function(e){
		e.preventDefault();
		fntGuardar();
	}

	async function fntGuardar(){
		let strNombre = document.querySelector("#txtNombre").value;
		let strApellido = document.querySelector("#txtApellido").value;
		let intTelefono = document.querySelector("#txtTelefono").value;
		let strEmail = document.querySelector("#txtEmail").value;
		if(strNombre == "" || strApellido == "" || intTelefono == "" || strEmail == ""){
			alert("Todos los campos son obligatorios");
			return;
		} 
		try{
			const data = new FormData(frmRegistro);
			let resp = await fetch(base_url+"controllers/Persona.php?op=registro",{
				method: 'POST',
				mode: 'cors',
				cache: 'no-cache',
				body: data
			});
			json = await resp.json();
			if(json.status){
				swal("Guardar",json.msg,"success");
				frmRegistro.reset();
			}else{
				swal("Guardar",json.msg,"error");
			}
		}catch(err){
			console.log("Ocurrio un error: "+err);
		}
			
	}

}

async function fntMostrar(id){
	const formData = new FormData();
	formData.append('idpersona',id);
	try{
		let resp = await fetch(base_url+"controllers/Persona.php?op=verregistro",{
				method: 'POST',
				mode: 'cors',
				cache: 'no-cache',
				body: formData
			});
		json = await resp.json();
		if(json.status){
			document.querySelector("#txtId").value = json.data.idpersona;
			document.querySelector("#txtNombre").value = json.data.nombre;
			document.querySelector("#txtApellido").value = json.data.apellido;
			document.querySelector("#txtTelefono").value = json.data.telefono;
			document.querySelector("#txtEmail").value = json.data.email;
		}else{
			window.location = base_url+'views/persona/';
		}

	}catch(err){
		console.log("Ocurrio un error: "+err);
	}
}

if(document.querySelector("#frmEditar")){
	let frmEditar = document.querySelector("#frmEditar");
	frmEditar.onsubmit = function(e){
		e.preventDefault();
		fntEditar();
	}

	async function fntEditar(){
		let intId = document.querySelector("#txtId").value;
		let strNombre = document.querySelector("#txtNombre").value;
		let strApellido = document.querySelector("#txtApellido").value;
		let intTelefono = document.querySelector("#txtTelefono").value;
		let strEmail = document.querySelector("#txtEmail").value;
		if(intId == "" || strNombre == "" || strApellido == "" || intTelefono == "" || strEmail == ""){
			alert("Todos los campos son obligatorios");
			return;
		} 
		try{
			const data = new FormData(frmEditar);
			let resp = await fetch(base_url+"controllers/Persona.php?op=actualizar",{
				method: 'POST',
				mode: 'cors',
				cache: 'no-cache',
				body: data
			});
			json = await resp.json();
			if(json.status){
				swal("Actualizar",json.msg,"success");
			}else{
				swal("Actualizar",json.msg,"error");
			}
		}catch(err){
			console.log("Ocurrio un error: "+err);
		}
			
	}

}

function fntDelPersona(id){
  swal({
    title: "¿Realmente quiere eliminar el registro?",
    text: "",
    icon: "warning",
    buttons: true,
    dangerMode: true,
  })
  .then((willDelete) => {
    if (willDelete) {
      fntDelete(id);
    }
  });

}

async function fntDelete(id) {
	try{
		let formData = new FormData();
		formData.append('idpersona',id);
		let resp = await fetch(base_url+"controllers/Persona.php?op=eliminar",{
			method: 'POST',
			mode: 'cors',
			cache: 'no-cache',
			body: formData
		});
		json = await resp.json();
		if(json.status){
			swal("Eliminar",json.msg,"success");
			document.querySelector("#row_"+id).remove();
		}else{
			swal("Eliminar",json.msg,"error");
		}
	}catch(err){
		console.log("Ocurrio un error: "+err);
	}
}

if(document.querySelector("#frmSearch")){
	let frmSearch = document.querySelector("#frmSearch");
	frmSearch.onsubmit = function(e){
		e.preventDefault();


		let busqueda = document.querySelector("#txtBuscar").value;
		if(busqueda ==""){
			getPersona();
		}else{
			fntBuscarRegistros();
		}	
	}
	let inputSearch = document.querySelector("#txtBuscar");
	inputSearch.addEventListener("keyup",fntInputSearch,true);

	async function fntBuscarRegistros(){
		document.querySelector("#tblBodyPersonas").innerHTML = "";
		try{
			let formData = new FormData(frmSearch);
			let resp = await fetch(base_url+"controllers/Persona.php?op=buscar",{
				method: 'POST',
				mode: 'cors',
				cache: 'no-cache',
				body: formData
			});
			console.log(resp);
			json = await resp.json();
			if(json.status){
				let data = json.data;
				data.forEach((item) =>{
					let newtr = document.createElement("tr");
					newtr.id = "row_"+item.idpersona;
					newtr.innerHTML = `<tr>
									      <th scope="row">${item.idpersona}</th>
									      <td>${item.nombre}</td>
									      <td>${item.apellido}</td>
									      <td>${item.telefono}</td>
									      <td>${item.email}</td>
									      <td>
									      	<a href="${base_url}views/persona/editar-persona.php?p=${item.idpersona}" class="btn btn-outline-primary btn-sm" title="Editar registro"> <i class="fas fa-user-edit"></i> </a>
			      							<button class="btn btn-outline-danger btn-sm" title="Eliminar registro" onclick="fntDelPersona(${item.idpersona})" ><i class="fas fa-trash-alt"></i></button>
									      </td>`;
					document.querySelector("#tblBodyPersonas").appendChild(newtr);
				});
			}

		}catch(err){
			console.log("Ocurrio un error: "+err);
		}
		}
	function fntInputSearch(){
		let inputBus = document.querySelector("#txtBuscar").value;
		if(inputBus ==""){
			getPersona();
		}else{
			fntBuscarRegistros();
		}
	}
}
