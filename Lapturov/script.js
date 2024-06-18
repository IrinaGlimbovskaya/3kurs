document.querySelector('#elastic').oninput = function(){
    let val = this.value.trim(); //убираем пробелы
    let elasticItems = document.querySelectorAll(".elastic li");
    if (val != ""){ 
        elasticItems.forEach(function(elem){
            if (elem.innerText.search(val) == -1) {
                elem.classList.add('hide');
                //elem.innerHTML = elem.innerText;
            }
            else {
                elem.classList.remove('hide');
                let str = elem.innerText;
                //elem.innerHTML = Mark(str, elem.innerText.search(val), val.length);
            }
        });
    }
    else {
        elasticItems.forEach(function(elem){
                elem.classList.remove('hide');
              //  elem.innerHTML = elem.innerText;
        });
    }
}

 //function Mark(text, pos, len){
//    return text.slice(0, pos)+'<mark>'+text.slice(pos, pos+len)+'</mark>'+text.slice(pos+len);
// }
