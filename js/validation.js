const form = document.getElementById('myForm');
const fname = document.getElementById('fname');
const lname = document.getElementById('lname');
const nic = document.getElementById('nic');
const mno = document.getElementById('mno');
const add = document.getElementById('add');


form.addEventListener('submit', e => {
	e.preventDefault();

	validateInputs();
});

const setError =(element,message) => {
	const inputControl = element.parentElement;
	const errorDisplay = inputControl.querySelector('.error');

	errorDisplay.innerText = message;
	inputControl.classList.add('error');
	inputControl.classList.remove('success');
	

}

const setSuccess = element => {
	const inputControl = element.parentElement;
	const errorDisplay = inputControl.querySelector('.error');

	errorDisplay.innerText = message;
	inputControl.classList.add('success');
	inputControl.classList.remove('error');
};


const isValidNumber = mno => {
	const re= /^(?:0|94|\+94)?(?:(11|21|23|24|25|26|27|31|32|33|34|35|36|37|38|41|45|47|51|52|54|55|57|63|65|66|67|81|912)(0|2|3|4|5|7|9)|7(0|1|2|4|5|6|7|8)\d)\d{6}$/;  
}

const isValidNIC = nic => {
	const ne2= /^([0-9]{9}[x|X|v|V]|[0-9]{12})$/;  
}

const validateInputs =() => {
	const fnamevalue = fname.value.trim();
	const lnamevalue = lname.value.trim();
	const nicvalue = nic.value.trim();
	const mnovalue = mno.value.trim();
	const addvalue = add.valur.trim();

	if(fnamevalue === ''){
		setError(fname,'first name is required');
	}else {
		setSuccess(fname);

	}

	if(lnamevalue === ''){
		setError(lname,'last name is required');
	}else {
		setSuccess(lname);

	}

	if(nicvalue === ''){
		setError(nic,'NIC-No is required');
	}else if(!isValidNIC(nicvalue)) {
		setError(nic,'provide valid NIC-Number');
	}else {
		setSuccess(nic);

	}

	if(mnovalue === ''){
		setError(mno,'Mobile-No is required');
	}else if(!isValidNumber(mnovalue) &&  mnovalue.length < 10) {
		setError(mno,'provide valid Mobile Number');
	}else {
		setSuccess(mno);

	}

	if(addvalue === ''){
		setError(add,'Address is required');
	}else {
		setSuccess(add);

	}


}