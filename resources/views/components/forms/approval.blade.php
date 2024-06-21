@if ($sended)
  <script>
    document.addEventListener("DOMContentLoaded", function() {
      // ページの読み込みが完了したら実行
      document.querySelector(".contactform-form").style.display = "none";

      // statusIconsのクラス変更
      const statusIcons = document.querySelectorAll(".status-icon");
      statusIcons[0].classList.remove("active");
      statusIcons[1].classList.remove("active");
      statusIcons[2].classList.add("active");

      // 入力必須事項の文言を非表示
      document.querySelector(".supply").style.display = "none";
    });
  </script>
  <div style="padding: 30px; padding-bottom: 70px"><p style="text-align: center">送信が完了しました。</p></div>
@endif

<div class="contactform-form">
  <form action="" method="post" id="contactform-contact" name="contact">
    @csrf
    <h3>物件情報</h3>
    <ul class="field-list">
      <li class="field-item">
        <div class="field-head"><label class="required">マンション名・棟</label></div>
        <?php
        if (isset($_GET['m_id'])) {
        echo '<div class="field-body"><input type="text" name="manshion_name_bldg" value="'.$_GET['m_title'].'"></div>';
        }else{
        echo '<div class="field-body"><input type="text" name="manshion_name_bldg" value=""></div>';
        }
        ?>
      </li>
      <li class="field-item">
        <div class="field-head"><label class="required">部屋番号</label></div>
        <div class="field-body"><input type="text" name="room_number"></div>
      </li>
      <li class="field-item">
        <div class="field-head"><label class="required">物件所在地</label></div>
        <?php
        if (isset($_GET['m_id'])) {
        echo '<div class="field-body"><input type="text" name="address" value="'.$_GET['m_address'].'"></div>';
        }else{
        echo '<div class="field-body"><input type="text" name="address" value=""></div>';
        }
        ?>
      </li>

      <li class="field-item">
        <div class="field-head"><label class="required">ご売却希望価格</label></div>
        <div class="field-body"><input type="text" name="sales"></div>
      </li>
      <li class="field-item">
        <div class="field-head"><label class="required">残債</label></div>
        <div class="field-body"><input type="text" name="loan"></div>
      </li>
      <li class="field-item field-item-radio">
        <div class="field-head"><label class="required">ご売却予定時期</label></div>
        <div class="field-body">
          <label class="radio-btn"><input type="radio" name="schedule" value="今すぐ" checked>今すぐ</label>
          <label class="radio-btn"><input type="radio" name="schedule" value="3ヶ月以内">3ヶ月以内</label>
          <label class="radio-btn"><input type="radio" name="schedule" value="1年以内">1年以内</label>
          <label class="radio-btn"><input type="radio" name="schedule" value="希望価格で売れるなら">希望価格で売れるなら</label>
          <label class="radio-btn"><input type="radio" name="schedule" value="未定">未定</label>
        </div>
      </li>
    </ul>

    <h3>お客様情報</h3>
    <ul class="field-list">
      <li class="field-item">
        <div class="field-head"><label class="required">名前</label></div>
        <div class="field-body">
          <div class="field-children">
            <div class="child-field">
              <div class="child-head"><label>性</label></div>
              <div class="child-body"><input type="text" name="first_name"></div>
            </div>
            <div class="child-field">
              <div class="child-head"><label>名</label></div>
              <div class="child-body"><input type="text" name="last_name"></div>
            </div>
          </div>
        </div>
      </li>
      <li class="field-item">
        <div class="field-head"><label class="required">なまえ（ふりがな）</label></div>
        <div class="field-body">
          <div class="field-children">
            <div class="child-field">
              <div class="child-head"><label>せい</label></div>
              <div class="child-body"><input type="text" name="first_name_gana"></div>
            </div>
            <div class="child-field">
              <div class="child-head"><label>めい</label></div>
              <div class="child-body"><input type="text" name="last_name_gana"></div>
            </div>
          </div>
        </div>
      </li>
      <li class="field-item">
        <div class="field-head"><label class="required">電話番号</label></div>
        <div class="field-body"><input type="tel" name="tel"></div>
      </li>
      <li class="field-item">
        <div class="field-head"><label class="required">メールアドレス</label></div>
        <div class="field-body"><input type="email" name="email"></div>
      </li>
    </ul>
    <h3>お問い合わせ内容</h3>
    <ul class="field-list">
      <li class="field-item">
        <div class="field-head"><label class="required">お問い合わせ内容</label></div>
        <div class="field-body">
          <div class="select-wrapper">
            <select name="contact_content" id="">
              <option hidden>選択してください</option>
              <option value="無料査定について">無料査定について</option>
              <option value="相続についてのご相談">相続についてのご相談</option>
              <option value="買い替えについてのご相談">買い替えについてのご相談</option>
              <option value="その他">その他</option>
            </select>
          </div>
        </div>
      </li>
      <li class="field-item textarea">
        <div class="field-head">
          <label>備考</label>
          <p>※ご希望連絡時間やご相談物件の特徴などございましたらお聞かせください。</p>
        </div>
        <div class="field-body"><textarea name="note" id="" cols="30" rows="10"></textarea></div>
      </li>
    </ul>
    <div class="contactform-footer">
      <p>個人情報の取扱いについて<br class="sp-br">（必ずお読みください）</p>
      <div class="privacy-policy"><a href="/privacy-policy">プライバシーポリシー</a></div>
      <div class="approval">
        <p>
          <input type="hidden" name="approval" value="0">
          <input type="checkbox" name="approval" value="1" class="approvalInput">
          <label>上記に同意する<span> *</span></label>
        </p>
      </div>

      <div class="back"><button type="button" onclick="backOnClick()">入力画面に戻る</button></div>
      <div class="submit"><input type="submit" name="submit" value="送信する"></div>
      <div class="confirm"><button type="button" onclick="comfirmOnClick()">確認画面へ</button></div>
    </div>
  </form>
</div>