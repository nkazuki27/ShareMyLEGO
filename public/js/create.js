document.getElementById('inputFileReset_0').addEventListener('click', function() {
    var elem = document.getElementById('image_0');
    elem.value = '';
    elem.dispatchEvent(new Event('change'));
});
document.getElementById('inputFileReset_1').addEventListener('click', function() {
    var elem = document.getElementById('image_1');
    elem.value = '';
    elem.dispatchEvent(new Event('change'));
});
document.getElementById('inputFileReset_2').addEventListener('click', function() {
    var elem = document.getElementById('image_2');
    elem.value = '';
    elem.dispatchEvent(new Event('change'));
});

function addForm() {
    const div1 = document.getElementById("form_area");

    var div2 = document.createElement("div");
    div2.className = "form-body";

    var div3 = document.createElement("div");
    div3.className = "h5 mb-3";
    var text3 = document.createTextNode("[部品" + i + "]");
    div3.appendChild(text3);
    div2.appendChild(div3);

    var div4_1 = document.createElement("div");
    div4_1.className = "form-check form-check-inline mb-3";
    var input4_1 = document.createElement("input");
    input4_1.className = "form-check-input";
    input4_1.type = "radio";
    input4_1.name = "q_" + i;
    input4_1.id = "1";
    input4_1.value = "1";
    input4_1.onclick = function(){
    formSwitch(i)
    };
    div4_1.appendChild(input4_1);
    var label4_1 = document.createElement("label");
    label4_1.htmlFor = "q_" + i;
    label4_1.className = "form-check-label";
    label4_1.appendChild(input4_1);
    var text4_1 = document.createTextNode("ブロック");
    label4_1.appendChild(text4_1);
    div4_1.appendChild(label4_1);
    div2.appendChild(div4_1);

    var div4_2 = document.createElement("div");
    div4_2.className = "form-check form-check-inline mb-3";
    var input4_2 = document.createElement("input");
    input4_2.className = "form-check-input";
    input4_2.type = "radio";
    input4_2.name = "q_" + i;
    input4_2.id = "2";
    input4_2.value = "2";
    input4_2.onclick = function(){
    formSwitch(i)
    };
    div4_2.appendChild(input4_2);
    var label4_2 = document.createElement("label");
    label4_2.htmlFor = "q_" + i;
    label4_2.className = "form-check-label";
    var text4_2 = document.createTextNode("プレート");
    label4_2.appendChild(text4_2);
    div4_2.appendChild(label4_2);
    div2.appendChild(div4_2);

    var div4_3 = document.createElement("div");
    div4_3.className = "form-check form-check-inline mb-3";
    var input4_3 = document.createElement("input");
    input4_3.className = "form-check-input";
    input4_3.type = "radio";
    input4_3.name = "q_" + i;
    input4_3.id = "3";
    input4_3.value = "3";
    input4_3.onclick = function(){
    formSwitch(i)
    };
    div4_3.appendChild(input4_3);
    var label4_3 = document.createElement("label");
    label4_3.htmlFor = "q_" + i;
    label4_3.className = "form-check-label";
    var text4_3 = document.createTextNode("タイル");
    label4_3.appendChild(text4_3);
    div4_3.appendChild(label4_3);
    div2.appendChild(div4_3);

    var div4_4 = document.createElement("div");
    div4_4.className = "form-check form-check-inline mb-3";
    var input4_4 = document.createElement("input");
    input4_4.className = "form-check-input";
    input4_4.type = "radio";
    input4_4.name = "q_" + i;
    input4_4.id = "4";
    input4_4.value = "4";
    input4_4.onclick = function(){
    formSwitch(i)
    };
    div4_4.appendChild(input4_4);
    var label4_4 = document.createElement("label");
    label4_4.htmlFor = "q_" + i;
    label4_4.className = "form-check-label";
    var text4_4 = document.createTextNode("その他");
    label4_4.appendChild(text4_4);
    div4_4.appendChild(label4_4);
    div2.appendChild(div4_4);

    var div5 = document.createElement("div");
    div5.className = "row align-items-center mb-3";
    //div5.style = "display:none";
    div5.id = "else_" + i;
    var div5_1 = document.createElement("div");
    div5_1.className = "col-auto";
    var label5 = document.createElement("label");
    label5.htmlFor = "content_" + i;
    label5.className = "col-form-label";
    var text5 = document.createTextNode("※その他の場合：");
    label5.appendChild(text5);
    div5_1.appendChild(label5);
    div5.appendChild(div5_1);
    var div5_2 = document.createElement("div");
    div5_2.className = "col-auto";
    var input5 = document.createElement('input');
    input5.type = 'text';
    input5.name = 'content_' + i;
    input5.id = 'content_' + i;
    input5.placeholder = '(例)フィギュア';
    input5.className = "form-control";
    div5_2.appendChild(input5);
    div5.appendChild(div5_2);
    div2.appendChild(div5);

    var div6 = document.createElement("div");
    div6.className = "row align-items-center mb-3";
    var div6_1 = document.createElement("div");
    div6_1.className = "col-auto";
    var label6_1 = document.createElement("label");
    label6_1.htmlFor = "number_1_" + i;
    label6_1.className = "col-form-label";
    var text6_1 = document.createTextNode("・サイズ：");
    label6_1.appendChild(text6_1);
    div6_1.appendChild(label6_1);
    div6.appendChild(div6_1);
    var div6_2 = document.createElement("div");
    div6_2.className = "col-auto";
    var input6_1 = document.createElement('input');
    input6_1.type = 'number';
    input6_1.name = 'number_1_' + i;
    input6_1.id = 'number_1_' + i;
    input6_1.placeholder = '縦';
    input6_1.className = "form-control";
    div6_2.appendChild(input6_1);
    div6.appendChild(div6_2);
    var div6_3 = document.createElement("div");
    div6_3.className = "col-auto";
    var label6_2 = document.createElement("label");
    label6_2.htmlFor = "number_2_" + i;
    label6_2.className = "col-form-label";
    var text6 = document.createTextNode("×");
    label6_2.appendChild(text6);
    div6_3.appendChild(label6_2);
    div6.appendChild(div6_3);
    var div6_4 = document.createElement("div");
    div6_4.className = "col-auto";
    var input6_2 = document.createElement('input');
    input6_2.type = 'number';
    input6_2.name = 'number_2_' + i;
    input6_2.id = 'number_2_' + i;
    input6_2.placeholder = '横';
    input6_2.className = "form-control";
    div6_4.appendChild(input6_2);
    div6.appendChild(div6_4);
    div2.appendChild(div6);

    var div7 = document.createElement("div");
    div7.className = "row align-items-center mb-3";
    var div7_1 = document.createElement("div");
    div7_1.className = "col-auto";
    var label7 = document.createElement("div");
    label7.htmlFor = "color_" + i;
    label7.className = "col-form-label";
    var text7 = document.createTextNode("・色：");
    label7.appendChild(text7);
    div7_1.appendChild(label7);
    div7.appendChild(div7_1);
    var div7_2 = document.createElement("div");
    div7_2.className = "col-auto";
    var input7 = document.createElement('input');
    input7.type = 'text';
    input7.name = 'color_' + i;
    input7.id = 'color_' + i;
    input7.placeholder = '(例)レッド';
    input7.className = "form-control";
    div7_2.appendChild(input7);
    div7.appendChild(div7_2);
    div2.appendChild(div7);

    var div8 = document.createElement("div");
    div8.className = "row align-items-center mb-3";
    var div8_1 = document.createElement("div");
    div8_1.className = "col-auto";
    var label8_1 = document.createElement("label");
    label8_1.htmlFor = "color_" + i;
    label8_1.className = "col-form-label";
    var text8_1 = document.createTextNode("・個数：");
    label8_1.appendChild(text8_1);
    div8_1.appendChild(label8_1);
    div8.appendChild(div8_1);
    var div8_2 = document.createElement("div");
    div8_2.className = "col-auto";
    var input8 = document.createElement('input');
    input8.type = 'number';
    input8.name = 'count_' + i;
    input8.id = 'count_' + i;
    input8.placeholder = '(例)2';
    input8.className = "form-control";
    div8_2.appendChild(input8);
    div8.appendChild(div8_2);
    var div8_3 = document.createElement("div");
    div8_3.className = "col-auto";
    var label8_2 = document.createElement("label");
    label8_2.htmlFor = "color_" + i;
    label8_2.className = "col-form-label";
    var text8_2 = document.createTextNode("個");
    label8_2.appendChild(text8_2);
    div8_3.appendChild(label8_2);
    div8.appendChild(div8_3);
    div2.appendChild(div8);

    var hr = document.createElement("HR");
    div2.appendChild(hr);

    div1.appendChild(div2);

    i++ ;
}

function formSwitch(num) {
    var div = document.getElementById("else_" + num);
    var radio = document.getElementsByName("q_" + num);
    if (radio[3].checked) {
        div.style.display = "";
    } else {
        div.style.display = "none";
    }
}

