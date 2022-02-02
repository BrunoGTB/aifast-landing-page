class Validator {

    constructor() {
        this.validations = [
            'data-required',
            'data-min-length',
            'data-max-length',
            'data-exa-length',
            'data-email-validate',
            'data-only-numbers',
            'data-only-letters',
            'data-selected'
        ]
    }
    // iniciar a validação de todos os campos
    validate(form) {
        // resgata todas as validações
        let currentValidations = document.querySelectorAll('form .error-validation');
        if(currentValidations.length > 0){
            this.cleanValidations(currentValidations);
        }
        // pega os inputs
        let inputs = form.getElementsByTagName('input');
        let selects = form.getElementsByTagName('select');
        // transforma uma HTMLCollection -> array
        let inputsArray = [...inputs]; 
        let selectsArray = [...selects];
        // loop nos inputs e validação mediante ao que for encontrado
        inputsArray.forEach(function(input){
            //loop com todas as validações existentes    
            for (let i = 0; this.validations.length > i; i++) {
                // verifica se a validação atual existe no input
                if(input.getAttribute(this.validations[i]) != null) {
                    //limpando a sting para virar um método
                    let method = this.validations[i].replace('data-', '').replace('-', '');
                    //valor do input
                    let value = input.getAttribute(this.validations[i]);
                    //invocar o método
                    this[method](input, value);
                }   
            }
        }, this);
        // loop nos selects e validação mediante ao que for encontrado
        selectsArray.forEach(function(select){
            //loop com todas as validações existentes    
            for (let i = 0; this.validations.length > i; i++) {
                // verifica se a validação atual existe no select
                if(select.getAttribute(this.validations[i]) != null) {
                    //limpando a sting para virar um método
                    let method = this.validations[i].replace('data-', '').replace('-', '');
                    //valor do select
                    let value = select.getAttribute(this.validations[i]);
                    //invocar o método
                    this[method](select, value);
                }   
            }
        }, this);
        currentValidations = document.querySelectorAll('form .error-validation');
        if(currentValidations.length == 0){
            form.submit();
        }
    }
    // verifica se um input tem um número mínimo de caracteres
    minlength(input, minValue) {
        let inputLength = input.value.length;
        let errorMessage = `O campo precisa ter pelo menos ${minValue} caracteres.`;
        if(inputLength < minValue){
            this.printMessage(input, errorMessage);
        }
    }
    // verifica se um input passou do limite de caracteres
    maxlength(input, maxValue){
        let inputLength = input.value.length;
        let errorMessage = `O campo pode ter no máximo ${maxValue} caracteres.`;
        if(inputLength > maxValue){
            this.printMessage(input, errorMessage);
        }
    }
    // verifica se um input tem um tamanho exato de caracteres
    exalength(input, exaValue){
        let inputLength = input.value.length;
        let errorMessage = `O campo deve ter exatamente ${exaValue} caracteres.`;
        if(inputLength != exaValue){
            this.printMessage(input, errorMessage);
            console.log(inputLength);
        }
    }
    // verifica se o input é requerido
    required(input){
        let inputValue = input.value;
        if(inputValue === ''){
            let errorMessage = `Este campo é obrigatório.`
            this.printMessage(input, errorMessage);
        }
    }
    // valida emails
    emailvalidate(input){
        //email@email.com -> email@email.com.br
        let re = /\S+@\S+\.\S+/;
        let email = input.value;
        let errorMessage = `Insira um e-mail no padrão usuario@email.com`
        if(!re.test(email)){
            this.printMessage(input, errorMessage);
        }
    }
    // verifica se o input só possui letras
    onlyletters(input){
        let re = /^[A-Za-z]+$/;
        let inputValue = input.value;
        let errorMessage = `Este campo não aceita números nem caracteres especiais.`
        if(!re.test(inputValue)){
            this.printMessage(input, errorMessage);
        }
    }
    // verifica se o select foi selecionado
    selected(input){
        let inputValue = input.value;
        if(inputValue === ''){
            let errorMessage = `Este campo é obrigatório.`
            this.printMessage(input, errorMessage);
        }
    }
    // método para imprimir mensagens de erro na tela
    printMessage(input, msg) {
        // quantidade de erros
        let errorsQty = input.parentNode.querySelector('.error-validation');
        if(errorsQty === null){
            let template = document.querySelector('.error-validation').cloneNode(true);
            template.textContent = msg;
            let inputParent = input.parentNode;
            template.classList.remove('template');
            inputParent.appendChild(template);
        }
    }
    // Limpa as validações da tela
    cleanValidations(validations, input){
        validations.forEach(el => el.remove())
    }
}


let form = document.getElementById("form-aifast");
let submit = document.getElementById("form-btn");


let validator = new Validator();

submit.addEventListener('click', function(e){

    e.preventDefault();

    validator.validate(form);

}); 

