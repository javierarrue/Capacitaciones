//Boton de agregar un nuevo input
const addFieldBtn = document.querySelector('.addFieldBtn');
//const deleteFieldBtn = document.querySelector('.deleteFieldBtn');
//Este es el div en donde se apendizaran los elementos html
const coursesDivWrapper = document.querySelector('.cursos');

//Variable inputCounter, necesaria para diferenciar un input de otro.
//inputCounter variable, needed to differentiate one input to another
var inputCounter = 1;
//HTML elements
var textInput, rowDiv, inputDiv, btnDiv, btnDeleteField, btnAccept, btnNotAccept,iconDelete,iconAccept,iconNotAccept; 
var btnGroup, radioAccept, labelAccept, radioNotAccept, labelNotAccept;
/*
var acceptBtn0 = document.querySelector('#accept0');
var notAcceptBtn0 = document.querySelector('#notAccept0'); 
var courseInput0 = document.querySelector('#curso0');
*/
addFieldBtn.addEventListener('click', () => {
    createHtmlElements();
    setInputType();
    //setValues();
    setAttributes();
    setClassNames();
    /*
    configureBtnAccept();
    configureBtnNotAccept();
    */
    configureBtnDelete();
    setIcons();
    //Juntando/anexando elementos en un solo elemento HTML
    appendChilds();
    inputCounter++;
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
    //textInput.value = document.querySelector('.cursoSugeridoText').value;
}

function setAttributes(){
    //Para campos no editablesquitar comentarios de linea
    //textInput.setAttribute('readonly','');
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
/*
//Esta funcion configura el boton de aceptar el curso seleccionado.
//Cambia el estado del boton (deshabilitado a disponible y viceversa)
function configureBtnAccept(){
    //Definir el id y value del boton aceptar, esto servirá como apuntador o identificador.
    btnAccept.id = "accept"+inputCounter;
    btnAccept.value = inputCounter;

    btnAccept.type = 'button';
    btnAccept.appendChild(iconAccept);

    //Asignando funcion onClick, para cada boton creado
    btnAccept.onclick = function(){
        //Este valor será usado para referenciar los id de los botones correspondientes
        var id = this.value;

        console.log(id);

        var accept = document.querySelector('#accept' + id);
        var notAccept = document.querySelector('#notAccept' + id);
        var courseInput = document.querySelector('#curso'+id);
        //Si el boton -aceptar- no ha sido seleccionado:
        if(accept.classList.contains('btn-outline-success')){
            //Marcalo como seleccionado y deshabilita el boton de -no aceptar-
            accept.classList.replace('btn-outline-success','btn-success');
            notAccept.disabled = true;
            courseInput.setAttribute('readonly', '');
        }else{
            //Viceversa (si está seleccionado, marcalo no seleccionado y habilita el boton de -no aceptar-)
            accept.classList.replace('btn-success','btn-outline-success');
            notAccept.disabled = false;
            courseInput.removeAttribute('readonly', '');
        }

    };
}

//Esta funcion configura el boton de no aceptar el curso seleccionado
//Cambia el estado del boton (deshabilitado a disponible y viceversa)
function configureBtnNotAccept(){
     //Definir el id y value del boton aceptar, esto servirá como apuntador o identificador.
    btnNotAccept.id = "notAccept"+inputCounter;
    btnNotAccept.value = inputCounter;

    btnNotAccept.type = 'button';
    btnNotAccept.appendChild(iconNotAccept);

    //Asignando funcion onClick, para cada boton creado
    btnNotAccept.onclick = function(){
         //Este valor será usado para referenciar los id de los botones correspondientes
        var id = this.value;

        var accept = document.querySelector('#accept' + id);
        var notAccept = document.querySelector('#notAccept' + id);
        var courseInput = document.querySelector('#curso'+id);
        //Si el boton -no aceptar- no ha sido seleccionado:
        if(notAccept.classList.contains('btn-outline-primary')){
            //Marcalo como seleccionado y deshabilitar el boton de -aceptar-
            notAccept.classList.replace('btn-outline-primary','btn-primary');
            accept.disabled = true;
            courseInput.setAttribute('readonly', '');
        }else{
            //Viceversa (si está seleccionado, marcalo no seleccionado y habilita el boton de -aceptar-)
            notAccept.classList.replace('btn-primary','btn-outline-primary');
            accept.disabled = false;
            courseInput.removeAttribute('readonly', '');
        }
    };
}

//Misma funcion anterior, pero esta es para el primer campo que siempre del documento
function accept(){
    //Si el boton -aceptar- no ha sido seleccionado:
    if(acceptBtn0.classList.contains('btn-outline-success')){
        //Marcalo como seleccionado y deshabilita el boton de -no aceptar-
        acceptBtn0.classList.replace('btn-outline-success','btn-success');
        notAcceptBtn0.disabled = true;
        courseInput0.setAttribute('readonly', '');
    }else{
        //Viceversa (si está seleccionado, marcalo no seleccionado y habilita el boton de -no aceptar-)
        acceptBtn0.classList.replace('btn-success','btn-outline-success');
        notAcceptBtn0.disabled = false;
        courseInput0.removeAttribute('readonly', '');
    }
}

function notAccept(){

    if(notAcceptBtn0.classList.contains('btn-outline-primary')){
        //Marcalo como seleccionado y deshabilitar el boton de -aceptar-
        notAcceptBtn0.classList.replace('btn-outline-primary','btn-primary');
        acceptBtn0.disabled = true;
        courseInput0.setAttribute('readonly', '');
    }else{
        //Viceversa (si está seleccionado, marcalo no seleccionado y habilita el boton de -aceptar-)
        notAcceptBtn0.classList.replace('btn-primary','btn-outline-primary');
        acceptBtn0.disabled = false;
        courseInput0.removeAttribute('readonly', '');
    }

}*/


//Asignando elementos al documento html
function appendChilds(){
    inputDiv.appendChild(textInput);
/*
    btnDiv.appendChild(btnAccept);
    btnDiv.appendChild(btnNotAccept);
    btnDiv.appendChild(btnDeleteField);
*/
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