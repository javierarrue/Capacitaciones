const addFieldBtn = document.querySelector('.addFieldBtn');
const deleteFieldBtn = document.querySelector('.deleteFieldBtn');
const coursesDivWrapper = document.querySelector('.cursos');

//Variable inputCounter, necesaria para diferenciar un input de otro.
//inputCounter variable, needed to differentiate one input to another
var inputCounter = 1;
//HTML elements
var textInput, rowDiv, inputDiv, btnDiv, btnDeleteField, btnAccept, btnNotAccept,iconDelete,iconAccept,iconNotAccept; 

addFieldBtn.addEventListener('click', () => {
    createHtmlElements();
    setInputType();
    setValues();
    setAttributes();
    setClassNames();
    configureBtnAccept();
    configureBtnNotAccept();
    configureBtnDelete();
    //Juntando/anexando elementos en uno solo elemento HTML
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
}

function setInputType(){
    textInput.type = 'text';
}

function setValues(){
    //Para campos editables eliminar linea de abajo
    //textInput.value = document.querySelector('.cursoSugeridoText').value;
}

function setAttributes(){
    //Para campos editables eliminar linea de abajo
    //textInput.setAttribute('readonly','');
    textInput.setAttribute('name','cursos['+inputCounter+']');
}

function setClassNames(){
    //Setting the inputCounter into the className of the input, so that is unique from each other.
    //Asignando el inputCounter al className del input, para que sea unico uno del otro. 
    rowDiv.className= 'row align-items-center mb-3 cursoSugerido'+inputCounter;
    textInput.className = "form-control"
    inputDiv.className = 'col-md-10 col-sm-10';
    btnDiv.className = 'col-md-2 col-sm-2';

    btnDeleteField.className = 'btn btn-outline-danger deleteFieldBtn me-1';
    btnAccept.className = 'btn btn-outline-success btn-sm me-1';
    btnNotAccept.className = 'btn btn-outline-primary btn-sm';
    
    iconDelete.className = 'bi bi-trash3-fill';
    iconAccept.className = 'bi bi-check';
    iconNotAccept.className = 'bi bi-x';
}

//This function configures the delete button
//Esta funcion configura el boton de eliminar un campo/input
function configureBtnDelete(){
    //var symbol = document.createTextNode('Quitar');
    //Set de current inputCounter to the button, for reference when deleting input
    //Definir el inputCounter actual, para hacer referencia cuando sea necesario eleminar el input.
    btnDeleteField.id = inputCounter;
    //btnDeleteField.appendChild(symbol);
    btnDeleteField.type = 'button';
    btnDeleteField.appendChild(iconDelete);

    //Asignando funcion onClick, para cada boton creado
    btnDeleteField.onclick = function(){
        //Getting the selected button id, to reference input to delete.
        //Obteniendo el id del boton seleccionado, para hacer referencia al input a eliminar
        var id = this.id;
        document.querySelector('.cursoSugerido'+id).remove();
    };
}

function configureBtnAccept(){
    //var symbol = document.createTextNode('Quitar');
    //Set de current inputCounter to the button, for reference when deleting input
    //Definir el inputCounter actual, para hacer referencia cuando sea necesario eleminar el input.
    btnAccept.id = "accept"+inputCounter;

    btnAccept.value = inputCounter;

    btnAccept.type = 'button';
    btnAccept.appendChild(iconAccept);

    //Asignando funcion onClick, para cada boton creado
    btnAccept.onclick = function(){
        var id = this.value;

        var accept = document.querySelector('#accept' + id);
        var notAccept = document.querySelector('#notAccept' + id);

        //Getting the selected button id, to reference input to delete.
        //Obteniendo el id del boton seleccionado, para hacer referencia al input a eliminar
        if(accept.classList.contains('btn-outline-success')){
            accept.classList.replace('btn-outline-success','btn-success');
            notAccept.setAttribute("disabled","");
        }else{
            accept.classList.replace('btn-success','btn-outline-success');
            notAccept.removeAttribute("disabled");
        }
    };
}


function configureBtnNotAccept(){
    btnNotAccept.id = "notAccept"+inputCounter;

    btnNotAccept.value = inputCounter;

    btnNotAccept.type = 'button';
    btnNotAccept.appendChild(iconNotAccept);

    //Asignando funcion onClick, para cada boton creado
    btnNotAccept.onclick = function(){
        var id = this.value;

        var accept = document.querySelector('#accept' + id);
        var notAccept = document.querySelector('#notAccept' + id);
        //Getting the selected button id, to reference input to delete.
        //Obteniendo el id del boton seleccionado, para hacer referencia al input a eliminar
        if(notAccept.classList.contains('btn-outline-primary')){
            notAccept.classList.replace('btn-outline-primary','btn-primary');
            accept.setAttribute("disabled","");
        }else{
            notAccept.classList.replace('btn-primary','btn-outline-primary');
            accept.removeAttribute("disabled");
        }
    };
}

function appendChilds(){
    inputDiv.appendChild(textInput);
    btnDiv.appendChild(btnDeleteField);

    btnDiv.appendChild(btnAccept);
    btnDiv.appendChild(btnNotAccept);

    rowDiv.appendChild(inputDiv);
    rowDiv.appendChild(btnDiv);
    //Asignandolo al div ya existente dentro del HTML (rowDiv -> coursesDivWrapper)
    coursesDivWrapper.appendChild(rowDiv);
}