var ssno = document.getElementById('ssno');
var sfname = document.getElementById('sfname');
var sumail = document.getElementById('sumail');
var sacyear = document.getElementById('sacyear');

ssno.addEventListener("blur",function(){
    if(this.value!='')
        sacyear.value = this.value.split('/')[1];
});

sfname.addEventListener("blur",function(){
    if(this.value!='' && ssno.value!=''){
        sumail.value = this.value.split(' ').pop().slice(0,8).toLowerCase()+"_"+sacyear.value.slice(2,4) + "" + ssno.value.slice(8,11)+"@stu.kln.ac.lk";
    }
});
