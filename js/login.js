const customName = document.getElementById('form-control');
const btn = document.querySelector('#btn-email')
btn.onclick = function(){
    if(customName.value !== ''){
        let name = customName.value;
        alert(name + ' đã đăng ký thành công!');
        alert('Chào mừng bạn đến với shop giày tốt!');
    }
} 