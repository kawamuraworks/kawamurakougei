// 入力されていない時のバリデーション
(function () {
    'use strict'

  // Bootstrapカスタム検証スタイルを適用してすべてのフォームを取得
  var forms = document.querySelectorAll('.needs-validation')

  // ループして帰順を防ぐ
  Array.prototype.slice.call(forms)
    .forEach(function (form) {
      form.addEventListener('submit', function (event) {
        if (!form.checkValidity()) {
          event.preventDefault()
          event.stopPropagation()
        }

        form.classList.add('was-validated')
      }, false)
    })
})()



// 新規登録時(create)の画像の追加・削除

let i = 1;

function addImage() {
  let div1 = document.createElement('div');
  div1.id = 'image_' + i;
  div1.className = 'pt-4';

  let image_p = document.createElement('p');
  image_p.className = 'mb-1';
  image_p.textContent = `${i+1}枚目`;

  let input_image = document.createElement('input');
  input_image.type = 'file';
  input_image.className = 'form-control';
  input_image.id = 'image_' + i;
  input_image.name = 'image_[]';
  input_image.placeholder = '画像を登録してください';
  input_image.required = true;

  let input_data = document.createElement('input');
  input_data.type = 'text';
  input_data.className = 'form-control mt-2';
  input_data.id = 'img_content_' + i;
  input_data.name = 'img_content_[]';
  input_data.placeholder = '20文字以下推奨';
  input_data.required = true;

  let span = document.createElement('span');
  span.className = 'invalid-feedback';
  span.textContent = '画像・説明文を登録してください';


  let parent = document.getElementById('images');
  parent.appendChild(div1);

  let parent2 = document.getElementById('image_' + i);
  parent2.appendChild(image_p);
  parent2.appendChild(input_image);
  parent2.appendChild(input_data);
  parent2.appendChild(span);

  i++;

}

function deleteImage() {
  if (i > 1) {
    const count = document.querySelectorAll('#images div').length;
    document.querySelectorAll('#images div')[count - 1].remove();
    i--;
  }
}

// 実績編集時(edit)の画像の追加・削除

let e = 1;

function addImageEdit() {
  let div1 = document.createElement('div');
  div1.id = 'image_' + e;
  div1.className = 'pt-4';

  let image_p = document.createElement('p');
  image_p.className = 'mb-1';
  image_p.textContent = `追加する画像${e}枚目`;

  let input_image = document.createElement('input');
  input_image.type = 'file';
  input_image.className = 'form-control';
  input_image.id = 'image_' + e;
  input_image.name = 'image_[]';
  input_image.placeholder = '画像を登録してください';
  input_image.required = true;

  let input_data = document.createElement('input');
  input_data.type = 'text';
  input_data.className = 'form-control mt-2';
  input_data.id = 'img_content_' + e;
  input_data.name = 'img_content_[]';
  input_data.placeholder = '20文字以下推奨';
  input_data.required = true;

  let span = document.createElement('span');
  span.className = 'invalid-feedback';
  span.textContent = '画像・説明文を登録してください';


  let parent = document.getElementById('images');
  parent.appendChild(div1);

  let parent2 = document.getElementById('image_' + e);
  parent2.appendChild(image_p);
  parent2.appendChild(input_image);
  parent2.appendChild(input_data);
  parent2.appendChild(span);

  e++;

}

function deleteImageEdit() {
  if (e > 1) {
    const count = document.querySelectorAll('#images div').length;
    document.querySelectorAll('#images div')[count - 1].remove();
    e--;
  }
}

// トップページでの#itemまでのスクロール
var element = document.getElementById('item-3'); // 移動させたい位置の要素を取得
    var rect = element.getBoundingClientRect();
    var position = rect.top;    // 一番上からの位置を取得

function scrollToItem() {
  scrollTo(100, position);
 }
