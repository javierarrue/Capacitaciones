const addFieldBtn = document.querySelector('.addFieldBtn');
const deleteFieldBtn = document.querySelector('.deleteFieldBtn');
const coursesDivWrapper = document.querySelector('.cursos');

//Variable inputCounter, necesaria para diferenciar un input de otro.
//inputCounter variable, needed to differentiate one input to another
var inputCounter = 1;
//HTML elements
var textInput, rowDiv, inputDiv, btnDiv, btnDeleteField,iconDelete; 

var btnGroup;

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
    iconDelete = document.createElement('i');
    btnGroup = document.createElement('div');
}

function setInputType(){
    textInput.type = 'text';
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
}

function setClassNames(){
    //Setting the inputCounter into the className of the input, so that is unique from each other.
    //Asignando el inputCounter al className del input, para que sea unico uno del otro. 
    rowDiv.className= 'row mb-3 cursoSugerido'+inputCounter;
    textInput.className = "form-control"
    inputDiv.className = 'col-lg-10 col-md-10 col-sm-12';
    btnDiv.className = 'col-lg-2 col-md-2 col-sm-12';
    btnDeleteField.className = 'btn btn-outline-danger btn-sm';
    
    iconDelete.className = 'bi bi-trash3-fill';
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

//Asignando elementos del documento
function appendChilds(){
    inputDiv.appendChild(textInput);
    btnGroup.appendChild(btnDeleteField);

    btnDiv.appendChild(btnGroup);

    rowDiv.appendChild(inputDiv);
    rowDiv.appendChild(btnDiv);
    
    //Asignandolo al div ya existente dentro del HTML (rowDiv -> coursesDivWrapper)
    coursesDivWrapper.appendChild(rowDiv);
}
