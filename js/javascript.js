function element_id(id){
	return document.getElementById(id)
}

function element_class(clss){
	return document.getElementsByClassName(clss)
}

function view_license(index){
	let lc = license_collection[index]
	
	element_id("license_software").innerHTML = lc.software
	element_id("license_code").innerHTML = lc.license_code
	element_id("license_purchase_date").innerHTML = lc.purchase_date
	element_id("license_expiration_date").innerHTML = lc.expiration_date
	element_id("license_machine_id").innerHTML = "<span class='right'>" + lc.machine_id + "</span><br><button onclick='ChangeMachine()' type='button' class='btn btn-success'>Change to " + lc.new_machine_id + "</button>"
	element_id("license_days_left").innerHTML = lc.days_left
	element_id("license_status").innerHTML = lc.status
	element_id("license_software").innerHTML = lc.software
	
	element_id("license_info_table").removeAttribute("hidden")
}

function hide_lit(){
	element_id("license_info_table").setAttribute("hidden","")
}

function ChangeMachineID(){
	
}

function endingbet(elem){
	$('#myModal').modal('show');
	//alert(elem.getElementsByClassName("ending-bet")[0].innerHTML)
}