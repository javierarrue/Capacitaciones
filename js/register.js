const addFieldBtn = document.querySelector('.addFieldBtn');
const deleteFieldBtn = document.querySelector('.deleteFieldBtn');
const coursesDivWrapper = document.querySelector('.cursos');

//Variable inputCounter, necesaria para diferenciar un input de otro.
//inputCounter variable, needed to differentiate one input to another
var inputCounter = 0;
//HTML elements
var textInput, rowDiv, inputDiv, btnDiv, btnDeleteField; 

addFieldBtn.addEventListener('click', () => {
    createHtmlElements();
    setInputType();
    setValues();
    setAttributes();
    setClassNames();
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
    btnDeleteField = document.createElement('button');
}

function setInputType(){
    textInput.type = 'text';
}

function setValues(){
    //Para campos editables eliminar linea de abajo
    textInput.value = document.querySelector('.cursoSugeridoText').value;
}

function setAttributes(){
    //Para campos editables eliminar linea de abajo
    textInput.setAttribute('readonly','');
    textInput.setAttribute('name','cursoSugerido'+inputCounter);
}

function setClassNames(){
    //Setting the inputCounter into the className of the input, so that is unique from each other.
    //Asignando el inputCounter al className del input, para que sea unico uno del otro. 
    rowDiv.className= 'row align-items-center mb-3 cursoSugerido'+inputCounter;
    textInput.className = "form-control"
    inputDiv.className = 'col-md-10 col-sm-10';
    btnDiv.className = 'col-md-2 col-sm-2';
    btnDeleteField.className = 'btn btn-outline-danger deleteFieldBtn';
}

//This function configures the delete button
//Esta funcion configura el boton de eliminar un campo/input
function configureBtnDelete(){
    var symbol = document.createTextNode('-');
    //Set de current inputCounter to the button, for reference when deleting input
    //Definir el inputCounter actual, para hacer referencia cuando sea necesario eleminar el input.
    btnDeleteField.id = inputCounter;
    btnDeleteField.appendChild(symbol);
    btnDeleteField.type = 'button';

    //Asignando funcion onClick, para cada boton creado
    btnDeleteField.onclick = function(){
        //Getting the selected button id, to reference input to delete.
        //Obteniendo el id del boton seleccionado, para hacer referencia al input a eliminar
        var id = this.id;
        document.querySelector('.cursoSugerido'+id).remove();
    };
}

function appendChilds(){
    inputDiv.appendChild(textInput);
    btnDiv.appendChild(btnDeleteField);
    rowDiv.appendChild(inputDiv);
    rowDiv.appendChild(btnDiv);
    //Asignandolo al div ya existente dentro del HTML (rowDiv -> coursesDivWrapper)
    coursesDivWrapper.appendChild(rowDiv);
}