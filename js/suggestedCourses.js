//Boton de agregar un nuevo input
const addFieldBtn = document.querySelector('.addFieldBtn');
//Este es el div en donde se apendizaran los elementos html
const coursesDivWrapper = document.querySelector('.cursos');

//Variable inputCounter, necesaria para diferenciar un input de otro.
//inputCounter variable, needed to differentiate one input to another
var inputCounter = 0;
//HTML elements
var textInput, rowDiv, inputDiv, btnDiv, btnDeleteField, btnAccept, btnNotAccept,iconDelete,iconAccept,iconNotAccept; 
var btnGroup, radioAccept, labelAccept, radioNotAccept, labelNotAccept;
addFieldBtn.addEventListener('click', () => {
    if(validInput()){
        createHtmlElements();
        setInputType();
        setValues();
        setAttributes();
        setClassNames();
        configureBtnDelete();
        setIcons();
        //Juntando/anexando elementos en un solo elemento HTML
        appendChilds();
        inputCounter++;
    }
})

function createHtmlElements(){
    textInput = document.createElement('input');
    rowDiv = document.createElement('div');
    inputDiv = document.createElement('div'); 
    btnDiv = document.createElement('div');
    btnAccept = document.createElement('button');
    btnNotAccept = document.createElement('button');
    btnDeleteField = document.createElement('button');
    iconDelete = document.createElement('i');
    iconAccept = document.createElement('i');
    iconNotAccept = document.createElement('i');

    btnGroup = document.createElement('div');
    radioAccept = document.createElement('input');
    radioNotAccept = document.createElement('input');
    labelAccept = document.createElement('label');
    labelNotAccept = document.createElement('label');
}

function setInputType(){
    textInput.type = 'text';
    radioAccept.type = 'radio';
    radioNotAccept.type = 'radio';
}

function setValues(){
    //Para campos no editables quitar comentarios de linea
    textInput.value = document.querySelector('#cursoSugerido').selectedOptions[0].text;
}

function validInput(){
    var inputValue = document.querySelector('#cursoSugerido').value;
    if(inputValue == "null"){
        return false
    }else{
        return true
    }
}

function setAttributes(){
    //Para campos no editablesquitar comentarios de linea
    textInput.setAttribute('readonly','');
    textInput.setAttribute('name','cursos['+inputCounter+']');
    textInput.setAttribute('id','curso'+inputCounter);
    textInput.setAttribute('required', '');
    textInput.setAttribute('placeholder', 'Nombre del curso');
    //RADIO GROUP
    btnGroup.setAttribute('role', 'group');
    //Boton e input aceptar curso
    radioAccept.setAttribute('name', 'analisis'+inputCounter);
    radioAccept.setAttribute('id', 'btnAccept'+inputCounter);
    radioAccept.setAttribute('required', '');
    radioAccept.setAttribute('value', 'aceptado');
    labelAccept.setAttribute('for', 'btnAccept'+inputCounter);
    labelAccept.setAttribute('title', 'Aceptar curso');
    labelAccept.setAttribute('data-bs-toggle','tooltip');
    labelAccept.setAttribute('data-bs-placement','top');

    //Boton e input no aceptar curso
    radioNotAccept.setAttribute('name', 'analisis'+inputCounter);
    radioNotAccept.setAttribute('id', 'btnNotAccept'+inputCounter);
    radioNotAccept.setAttribute('required', '');
    radioNotAccept.setAttribute('value', 'noAceptado');
    labelNotAccept.setAttribute('title', 'Rechazar curso');
    labelNotAccept.setAttribute('for', 'btnNotAccept'+inputCounter);
}

function setClassNames(){
    //Setting the inputCounter into the className of the input, so that is unique from each other.
    //Asignando el inputCounter al className del input, para que sea unico uno del otro. 
    rowDiv.className= 'row mb-3 cursoSugerido'+inputCounter;
    textInput.className = "form-control cursoSugeridoInput"
    inputDiv.className = 'col-lg-10 col-md-10 col-sm-12';
    btnDiv.className = 'col-lg-2 col-md-2 col-sm-12';
    //Botones de aceptar, no aceptar y eliminar
    /*btnAccept.className = 'btn btn-outline-success btn-sm me-1';
    btnNotAccept.className = 'btn btn-outline-primary btn-sm me-1';*/
    btnDeleteField.className = 'btn btn-outline-danger btn-sm';
    labelAccept.className = 'btn btn-outline-success'
    labelNotAccept.className = 'btn btn-outline-primary';
    //Iconos para los botones
    iconDelete.className = 'bi bi-trash3-fill';
    iconAccept.className = 'bi bi-check';
    iconNotAccept.className = 'bi bi-x';
    //RADIO GROUP   
    btnGroup.className = 'btn-group'
    radioAccept.className = 'btn-check';
    radioNotAccept.className = 'btn-check';
}

function setIcons(){
    labelAccept.appendChild(iconAccept);
    labelNotAccept.appendChild(iconNotAccept);
}

//This function configures the delete button
//Esta funcion configura el boton de eliminar un campo/input
function configureBtnDelete(){
    //var symbol = document.createTextNode('Quitar');
    //Set de current inputCounter to the button, for reference when deleting input
    //Asignar el id con el inputCounter actual, este servirá de apuntador al eleminar el campo seleccionado
    btnDeleteField.id = inputCounter;
    btnDeleteField.type = 'button';
    btnDeleteField.appendChild(iconDelete);

    //Asignando funcion onClick
    btnDeleteField.onclick = function(){
        //Getting the selected button id, to reference input to delete.
        //Obteniendo el id del boton seleccionado, para hacer referencia al input a eliminar
        var id = this.id;
        document.querySelector('.cursoSugerido'+id).remove();
    };
}

//Asignando elementos al documento html
function appendChilds(){
    inputDiv.appendChild(textInput);
    btnGroup.appendChild(radioAccept);
    btnGroup.appendChild(labelAccept);
    btnGroup.appendChild(radioNotAccept);
    btnGroup.appendChild(labelNotAccept);
    btnGroup.appendChild(btnDeleteField);

    btnDiv.appendChild(btnGroup);

    rowDiv.appendChild(inputDiv);
    rowDiv.appendChild(btnDiv);
    
    //Asignandolo al div ya existente dentro del HTML (rowDiv -> coursesDivWrapper)
    coursesDivWrapper.appendChild(rowDiv);
}
//Mostrar seccion de agregar cursos requeridos al seleccionar un cargo de la lista select.
var selectCargo = document.querySelector("#cargo");
var seccion2 = document.querySelector("#seccion2");
function mostrar(){

    if(selectCargo.value != 0){
        //Utiliada la propiedad -opacity-, para esconder y mostrar la seccion
        //Esta es usada debido a que permite establecer una animacion al aperecer en pantalla.
        seccion2.style.opacity = "1"
    }
    
}