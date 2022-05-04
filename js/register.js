const addFieldBtn = document.querySelector('.addFieldBtn');
const deleteFieldBtn = document.querySelector('.deleteFieldBtn');
const coursesDivWrapper = document.querySelector('.cursos');
//Variable inputCounter, necesaria para diferenciar la lista de input's posibles a generar.
//inputCounter variable, needed to differentiate one input to another
var inputCounter = 0;

addFieldBtn.addEventListener('click', () => {
    createInput();
})

function createInput(){
    var input = document.createElement('input');
    
    var rowDiv = document.createElement('div');
    var inputDiv = document.createElement('div');
    var btnDiv = document.createElement('div');

    var btnDeleteField = document.createElement('button');
    var symbol = document.createTextNode('-');

    input.type = 'text';
    input.className = "form-control"
    //Si se quiere agregar campos editables comentar las dos lineas de abajo.
    input.value = document.querySelector('.cursoSugeridoText').value;
    input.setAttribute('readonly','');

    input.setAttribute('name','cursoSugerido'+inputCounter);
    
    //Setting the inputCounter into the className of the input, so that is unique from each other.
    //Asignando el inputCounter al className del input, para que sea unico uno del otro. 
    rowDiv.className = 'row align-items-center mb-3 cursoSugerido'+inputCounter
    inputDiv.className = 'col-md-10 col-sm-10'
    btnDiv.className = 'col-md-2 col-sm-2 text-center'
    btnDeleteField.className = 'btn btn-outline-danger deleteFieldBtn';
    
    //Set de current inputCounter to the button, for reference when deleting input
    //Definir el inputCounter actual, para hacer referencia cuando sea necesario eleminar el input.
    btnDeleteField.id = inputCounter;
    btnDeleteField.appendChild(symbol);
    btnDeleteField.type = 'button';

    //Delete selected inputfield
    btnDeleteField.onclick = function(){
        //Getting the selected button id, to reference input to delete.
        //Obteniendo el id del boton seleccionado, para hacer referencia al input a eliminar
        var id = this.id;
        document.querySelector('.cursoSugerido'+id).remove();
    };
    
    inputDiv.appendChild(input);
    btnDiv.appendChild(btnDeleteField);

    rowDiv.appendChild(inputDiv);
    rowDiv.appendChild(btnDiv);
    coursesDivWrapper.appendChild(rowDiv);

    inputCounter++;
}