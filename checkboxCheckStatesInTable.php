<!DOCTYPE html>
<html>

<head>
    <title>Checkbox Check States</title>
    <style>
        table {
            border-spacing: 0px;
            border-collapse: collapse;
        }

        td {
            border: 1px solid #505050;
        }
    </style>

    <script>
        function slc_checkbox_state(c, p) {
            var returned = {};
            var checkboxes = document.getElementsByClassName(c);
            for (var i = 0; i < checkboxes.length; i++) {
                returned[parseInt(checkboxes[i].id.split(p).join(''))] = checkboxes[i].checked
            }
            return returned;
        }

        /**
         * e => element {object} => checkbox element
         * t => type {integer} => 0 = slc_checkbox_change function run from checkbox element, 1 = slc_checkbox_change function run from slc_checkbox_change function
         * p => prefix {string} => characters at the beginning and end of id and class title
         * author: SLC
         * last update: 2020-07-06
         * v.1.0
         */
        function slc_checkbox_change(e, t, p) {
            var id = parseInt(e.id.split(p).join(''));
            var parent_id = parseInt((e.className.match(new RegExp(p + '\\d*' + p))[0]).split(p).join(''));
            var new_checked = e.checked;

            if (t === 0) {
                var childCheckbox = document.getElementsByClassName(p + id + p);
                for (var i = 0; i < childCheckbox.length; i++) {
                    if (childCheckbox[i].checked !== new_checked) {
                        childCheckbox[i].click();
                    }
                }
            }
            if (parent_id !== 0) {
                if (t === 0 || t === 1) {
                    var parentCheckbox = document.getElementsByClassName(p + parent_id + p);
                    var sum = 0;
                    for (var i = 0; i < parentCheckbox.length; i++) {
                        sum += Number(parentCheckbox[i].checked);
                        if (sum === 1) {
                            break;
                        }
                    }
                    if (sum > 0) {
                        document.getElementById(p + parent_id + p).checked = true;
                    } else {
                        document.getElementById(p + parent_id + p).checked = false;
                    }

                    slc_checkbox_change(document.getElementById(p + parent_id + p), 1, p);
                }
            }
        }
    </script>
</head>

<body>
    <button onclick="alert(JSON.stringify(slc_checkbox_state('check1','slc')));">Get Checkboxes Data {id:checked}</button>
    <table>
        <thead>
            <tr>
                <td>data (ID)</td>
                <td>data (PARENT ID)</td>
                <td>HIERARCHY (checkbox state)</td>
                <td>element (ID)</td>
                <td>element (CLASS)</td>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>0</td>
                <td style="padding-left:0px"><input type="checkbox" onchange="slc_checkbox_change(this,0,'slc');" class="slc0slc check1" id="slc1slc"><label for="slc1slc">UYGULAMA YÖNETİMİ</label></td>
                <td>slc1slc</td>
                <td>slc0slc</td>
            </tr>
            <tr>
                <td>2</td>
                <td>1</td>
                <td style="padding-left:30px"><input type="checkbox" onchange="slc_checkbox_change(this,0,'slc');" class="slc1slc check1" id="slc2slc"><label for="slc2slc">Genel Muhasebe</label></td>
                <td>slc2slc</td>
                <td>slc1slc</td>
            </tr>
            <tr>
                <td>3</td>
                <td>2</td>
                <td style="padding-left:60px"><input type="checkbox" onchange="slc_checkbox_change(this,0,'slc');" class="slc2slc check1" id="slc3slc"><label for="slc3slc">Yevmiye Kayıtları</label></td>
                <td>slc3slc</td>
                <td>slc2slc</td>
            </tr>
            <tr>
                <td>4</td>
                <td>2</td>
                <td style="padding-left:60px"><input type="checkbox" onchange="slc_checkbox_change(this,0,'slc');" class="slc2slc check1" id="slc4slc"><label for="slc4slc">Hesap Planı</label></td>
                <td>slc4slc</td>
                <td>slc2slc</td>
            </tr>
            <tr>
                <td>48</td>
                <td>2</td>
                <td style="padding-left:60px"><input type="checkbox" onchange="slc_checkbox_change(this,0,'slc');" class="slc2slc check1" id="slc48slc"><label for="slc48slc">Defterler</label></td>
                <td>slc48slc</td>
                <td>slc2slc</td>
            </tr>
            <tr>
                <td>49</td>
                <td>48</td>
                <td style="padding-left:90px"><input type="checkbox" onchange="slc_checkbox_change(this,0,'slc');" class="slc48slc check1" id="slc49slc"><label for="slc49slc">Yevmiye Defteri</label></td>
                <td>slc49slc</td>
                <td>slc48slc</td>
            </tr>
            <tr>
                <td>50</td>
                <td>48</td>
                <td style="padding-left:90px"><input type="checkbox" onchange="slc_checkbox_change(this,0,'slc');" class="slc48slc check1" id="slc50slc"><label for="slc50slc">Defter-i Kebir</label></td>
                <td>slc50slc</td>
                <td>slc48slc</td>
            </tr>
            <tr>
                <td>51</td>
                <td>48</td>
                <td style="padding-left:90px"><input type="checkbox" onchange="slc_checkbox_change(this,0,'slc');" class="slc48slc check1" id="slc51slc"><label for="slc51slc">Envanter Defteri</label></td>
                <td>slc51slc</td>
                <td>slc48slc</td>
            </tr>
            <tr>
                <td>52</td>
                <td>2</td>
                <td style="padding-left:60px"><input type="checkbox" onchange="slc_checkbox_change(this,0,'slc');" class="slc2slc check1" id="slc52slc"><label for="slc52slc">Durum Raporları</label></td>
                <td>slc52slc</td>
                <td>slc2slc</td>
            </tr>
            <tr>
                <td>53</td>
                <td>52</td>
                <td style="padding-left:90px"><input type="checkbox" onchange="slc_checkbox_change(this,0,'slc');" class="slc52slc check1" id="slc53slc"><label for="slc53slc">Mizan</label></td>
                <td>slc53slc</td>
                <td>slc52slc</td>
            </tr>
            <tr>
                <td>54</td>
                <td>52</td>
                <td style="padding-left:90px"><input type="checkbox" onchange="slc_checkbox_change(this,0,'slc');" class="slc52slc check1" id="slc54slc"><label for="slc54slc">Muavin</label></td>
                <td>slc54slc</td>
                <td>slc52slc</td>
            </tr>
            <tr>
                <td>5</td>
                <td>1</td>
                <td style="padding-left:30px"><input type="checkbox" onchange="slc_checkbox_change(this,0,'slc');" class="slc1slc check1" id="slc5slc"><label for="slc5slc">Kartlar</label></td>
                <td>slc5slc</td>
                <td>slc1slc</td>
            </tr>
            <tr>
                <td>6</td>
                <td>5</td>
                <td style="padding-left:60px"><input type="checkbox" onchange="slc_checkbox_change(this,0,'slc');" class="slc5slc check1" id="slc6slc"><label for="slc6slc">Stok (153)</label></td>
                <td>slc6slc</td>
                <td>slc5slc</td>
            </tr>
            <tr>
                <td>7</td>
                <td>5</td>
                <td style="padding-left:60px"><input type="checkbox" onchange="slc_checkbox_change(this,0,'slc');" class="slc5slc check1" id="slc7slc"><label for="slc7slc">Cari Hesap (120,320)</label></td>
                <td>slc7slc</td>
                <td>slc5slc</td>
            </tr>
            <tr>
                <td>8</td>
                <td>5</td>
                <td style="padding-left:60px"><input type="checkbox" onchange="slc_checkbox_change(this,0,'slc');" class="slc5slc check1" id="slc8slc"><label for="slc8slc">Avans (159,340)</label></td>
                <td>slc8slc</td>
                <td>slc5slc</td>
            </tr>
            <tr>
                <td>9</td>
                <td>5</td>
                <td style="padding-left:60px"><input type="checkbox" onchange="slc_checkbox_change(this,0,'slc');" class="slc5slc check1" id="slc9slc"><label for="slc9slc">Banka (102,300,400)</label></td>
                <td>slc9slc</td>
                <td>slc5slc</td>
            </tr>
            <tr>
                <td>10</td>
                <td>5</td>
                <td style="padding-left:60px"><input type="checkbox" onchange="slc_checkbox_change(this,0,'slc');" class="slc5slc check1" id="slc10slc"><label for="slc10slc">Kasa (100)</label></td>
                <td>slc10slc</td>
                <td>slc5slc</td>
            </tr>
            <tr>
                <td>11</td>
                <td>5</td>
                <td style="padding-left:60px"><input type="checkbox" onchange="slc_checkbox_change(this,0,'slc');" class="slc5slc check1" id="slc11slc"><label for="slc11slc">Çek/Senet (101,121)</label></td>
                <td>slc11slc</td>
                <td>slc5slc</td>
            </tr>
            <tr>
                <td>12</td>
                <td>5</td>
                <td style="padding-left:60px"><input type="checkbox" onchange="slc_checkbox_change(this,0,'slc');" class="slc5slc check1" id="slc12slc"><label for="slc12slc">Demirbaş (255)</label></td>
                <td>slc12slc</td>
                <td>slc5slc</td>
            </tr>
            <tr>
                <td>13</td>
                <td>5</td>
                <td style="padding-left:60px"><input type="checkbox" onchange="slc_checkbox_change(this,0,'slc');" class="slc5slc check1" id="slc13slc"><label for="slc13slc">Ortaklar (133)</label></td>
                <td>slc13slc</td>
                <td>slc5slc</td>
            </tr>
            <tr>
                <td>14</td>
                <td>5</td>
                <td style="padding-left:60px"><input type="checkbox" onchange="slc_checkbox_change(this,0,'slc');" class="slc5slc check1" id="slc14slc"><label for="slc14slc">Sermaye (500)</label></td>
                <td>slc14slc</td>
                <td>slc5slc</td>
            </tr>
            <tr>
                <td>15</td>
                <td>1</td>
                <td style="padding-left:30px"><input type="checkbox" onchange="slc_checkbox_change(this,0,'slc');" class="slc1slc check1" id="slc15slc"><label for="slc15slc">Raporlar</label></td>
                <td>slc15slc</td>
                <td>slc1slc</td>
            </tr>
            <tr>
                <td>16</td>
                <td>15</td>
                <td style="padding-left:60px"><input type="checkbox" onchange="slc_checkbox_change(this,0,'slc');" class="slc15slc check1" id="slc16slc"><label for="slc16slc">Muhasebe Raporları</label></td>
                <td>slc16slc</td>
                <td>slc15slc</td>
            </tr>
            <tr>
                <td>17</td>
                <td>16</td>
                <td style="padding-left:90px"><input type="checkbox" onchange="slc_checkbox_change(this,0,'slc');" class="slc16slc check1" id="slc17slc"><label for="slc17slc">Muavin</label></td>
                <td>slc17slc</td>
                <td>slc16slc</td>
            </tr>
            <tr>
                <td>18</td>
                <td>16</td>
                <td style="padding-left:90px"><input type="checkbox" onchange="slc_checkbox_change(this,0,'slc');" class="slc16slc check1" id="slc18slc"><label for="slc18slc">Mizan</label></td>
                <td>slc18slc</td>
                <td>slc16slc</td>
            </tr>
            <tr>
                <td>19</td>
                <td>16</td>
                <td style="padding-left:90px"><input type="checkbox" onchange="slc_checkbox_change(this,0,'slc');" class="slc16slc check1" id="slc19slc"><label for="slc19slc">Bilanço</label></td>
                <td>slc19slc</td>
                <td>slc16slc</td>
            </tr>
            <tr>
                <td>20</td>
                <td>16</td>
                <td style="padding-left:90px"><input type="checkbox" onchange="slc_checkbox_change(this,0,'slc');" class="slc16slc check1" id="slc20slc"><label for="slc20slc">Gelir Tablosu</label></td>
                <td>slc20slc</td>
                <td>slc16slc</td>
            </tr>
            <tr>
                <td>21</td>
                <td>16</td>
                <td style="padding-left:90px"><input type="checkbox" onchange="slc_checkbox_change(this,0,'slc');" class="slc16slc check1" id="slc21slc"><label for="slc21slc">Yevmiye Defteri</label></td>
                <td>slc21slc</td>
                <td>slc16slc</td>
            </tr>
            <tr>
                <td>22</td>
                <td>16</td>
                <td style="padding-left:90px"><input type="checkbox" onchange="slc_checkbox_change(this,0,'slc');" class="slc16slc check1" id="slc22slc"><label for="slc22slc">Defter-i Kebir</label></td>
                <td>slc22slc</td>
                <td>slc16slc</td>
            </tr>
            <tr>
                <td>23</td>
                <td>16</td>
                <td style="padding-left:90px"><input type="checkbox" onchange="slc_checkbox_change(this,0,'slc');" class="slc16slc check1" id="slc23slc"><label for="slc23slc">Envanter Defteri</label></td>
                <td>slc23slc</td>
                <td>slc16slc</td>
            </tr>
            <tr>
                <td>24</td>
                <td>15</td>
                <td style="padding-left:60px"><input type="checkbox" onchange="slc_checkbox_change(this,0,'slc');" class="slc15slc check1" id="slc24slc"><label for="slc24slc">Diğer Raporlar</label></td>
                <td>slc24slc</td>
                <td>slc15slc</td>
            </tr>
            <tr>
                <td>25</td>
                <td>24</td>
                <td style="padding-left:90px"><input type="checkbox" onchange="slc_checkbox_change(this,0,'slc');" class="slc24slc check1" id="slc25slc"><label for="slc25slc">Borç/Alacak Raporu</label></td>
                <td>slc25slc</td>
                <td>slc24slc</td>
            </tr>
            <tr>
                <td>26</td>
                <td>24</td>
                <td style="padding-left:90px"><input type="checkbox" onchange="slc_checkbox_change(this,0,'slc');" class="slc24slc check1" id="slc26slc"><label for="slc26slc">Çek/Senet Raporu</label></td>
                <td>slc26slc</td>
                <td>slc24slc</td>
            </tr>
            <tr>
                <td>27</td>
                <td>24</td>
                <td style="padding-left:90px"><input type="checkbox" onchange="slc_checkbox_change(this,0,'slc');" class="slc24slc check1" id="slc27slc"><label for="slc27slc">Avans Raporu</label></td>
                <td>slc27slc</td>
                <td>slc24slc</td>
            </tr>
            <tr>
                <td>28</td>
                <td>24</td>
                <td style="padding-left:90px"><input type="checkbox" onchange="slc_checkbox_change(this,0,'slc');" class="slc24slc check1" id="slc28slc"><label for="slc28slc">Kasa Raporu</label></td>
                <td>slc28slc</td>
                <td>slc24slc</td>
            </tr>
            <tr>
                <td>29</td>
                <td>24</td>
                <td style="padding-left:90px"><input type="checkbox" onchange="slc_checkbox_change(this,0,'slc');" class="slc24slc check1" id="slc29slc"><label for="slc29slc">Demirbaş Raporu</label></td>
                <td>slc29slc</td>
                <td>slc24slc</td>
            </tr>
            <tr>
                <td>30</td>
                <td>24</td>
                <td style="padding-left:90px"><input type="checkbox" onchange="slc_checkbox_change(this,0,'slc');" class="slc24slc check1" id="slc30slc"><label for="slc30slc">Krediler Raporu</label></td>
                <td>slc30slc</td>
                <td>slc24slc</td>
            </tr>
            <tr>
                <td>31</td>
                <td>0</td>
                <td style="padding-left:0px"><input type="checkbox" onchange="slc_checkbox_change(this,0,'slc');" class="slc0slc check1" id="slc31slc"><label for="slc31slc">SİSTEM YÖNETİMİ</label></td>
                <td>slc31slc</td>
                <td>slc0slc</td>
            </tr>
            <tr>
                <td>32</td>
                <td>31</td>
                <td style="padding-left:30px"><input type="checkbox" onchange="slc_checkbox_change(this,0,'slc');" class="slc31slc check1" id="slc32slc"><label for="slc32slc">Uygulama Tanımları</label></td>
                <td>slc32slc</td>
                <td>slc31slc</td>
            </tr>
            <tr>
                <td>33</td>
                <td>32</td>
                <td style="padding-left:60px"><input type="checkbox" onchange="slc_checkbox_change(this,0,'slc');" class="slc32slc check1" id="slc33slc"><label for="slc33slc">Şirketler</label></td>
                <td>slc33slc</td>
                <td>slc32slc</td>
            </tr>
            <tr>
                <td>34</td>
                <td>32</td>
                <td style="padding-left:60px"><input type="checkbox" onchange="slc_checkbox_change(this,0,'slc');" class="slc32slc check1" id="slc34slc"><label for="slc34slc">KDV Oranları</label></td>
                <td>slc34slc</td>
                <td>slc32slc</td>
            </tr>
            <tr>
                <td>35</td>
                <td>32</td>
                <td style="padding-left:60px"><input type="checkbox" onchange="slc_checkbox_change(this,0,'slc');" class="slc32slc check1" id="slc35slc"><label for="slc35slc">ÖTV Oranları</label></td>
                <td>slc35slc</td>
                <td>slc32slc</td>
            </tr>
            <tr>
                <td>36</td>
                <td>32</td>
                <td style="padding-left:60px"><input type="checkbox" onchange="slc_checkbox_change(this,0,'slc');" class="slc32slc check1" id="slc36slc"><label for="slc36slc">Gelir Vergisi Oranları</label></td>
                <td>slc36slc</td>
                <td>slc32slc</td>
            </tr>
            <tr>
                <td>37</td>
                <td>32</td>
                <td style="padding-left:60px"><input type="checkbox" onchange="slc_checkbox_change(this,0,'slc');" class="slc32slc check1" id="slc37slc"><label for="slc37slc">Para Birimleri</label></td>
                <td>slc37slc</td>
                <td>slc32slc</td>
            </tr>
            <tr>
                <td>38</td>
                <td>32</td>
                <td style="padding-left:60px"><input type="checkbox" onchange="slc_checkbox_change(this,0,'slc');" class="slc32slc check1" id="slc38slc"><label for="slc38slc">Döviz Kurları</label></td>
                <td>slc38slc</td>
                <td>slc32slc</td>
            </tr>
            <tr>
                <td>39</td>
                <td>31</td>
                <td style="padding-left:30px"><input type="checkbox" onchange="slc_checkbox_change(this,0,'slc');" class="slc31slc check1" id="slc39slc"><label for="slc39slc">Kullanıcı İşlemleri</label></td>
                <td>slc39slc</td>
                <td>slc31slc</td>
            </tr>
            <tr>
                <td>40</td>
                <td>39</td>
                <td style="padding-left:60px"><input type="checkbox" onchange="slc_checkbox_change(this,0,'slc');" class="slc39slc check1" id="slc40slc"><label for="slc40slc">Kullanıcı Grupları</label></td>
                <td>slc40slc</td>
                <td>slc39slc</td>
            </tr>
            <tr>
                <td>41</td>
                <td>39</td>
                <td style="padding-left:60px"><input type="checkbox" onchange="slc_checkbox_change(this,0,'slc');" class="slc39slc check1" id="slc41slc"><label for="slc41slc">Kullanıcılar</label></td>
                <td>slc41slc</td>
                <td>slc39slc</td>
            </tr>
            <tr>
                <td>42</td>
                <td>31</td>
                <td style="padding-left:30px"><input type="checkbox" onchange="slc_checkbox_change(this,0,'slc');" class="slc31slc check1" id="slc42slc"><label for="slc42slc">Yetkilendirme İşlemleri</label></td>
                <td>slc42slc</td>
                <td>slc31slc</td>
            </tr>
            <tr>
                <td>55</td>
                <td>42</td>
                <td style="padding-left:60px"><input type="checkbox" onchange="slc_checkbox_change(this,0,'slc');" class="slc42slc check1" id="slc55slc"><label for="slc55slc">Yetkiler</label></td>
                <td>slc55slc</td>
                <td>slc42slc</td>
            </tr>
            <tr>
                <td>43</td>
                <td>42</td>
                <td style="padding-left:60px"><input type="checkbox" onchange="slc_checkbox_change(this,0,'slc');" class="slc42slc check1" id="slc43slc"><label for="slc43slc">Grup Yetkileri</label></td>
                <td>slc43slc</td>
                <td>slc42slc</td>
            </tr>
            <tr>
                <td>44</td>
                <td>42</td>
                <td style="padding-left:60px"><input type="checkbox" onchange="slc_checkbox_change(this,0,'slc');" class="slc42slc check1" id="slc44slc"><label for="slc44slc">Kullanıcı Yetkileri</label></td>
                <td>slc44slc</td>
                <td>slc42slc</td>
            </tr>
            <tr>
                <td>45</td>
                <td>0</td>
                <td style="padding-left:0px"><input type="checkbox" onchange="slc_checkbox_change(this,0,'slc');" class="slc0slc check1" id="slc45slc"><label for="slc45slc">GELİŞTİRİCİ ARAÇLARI</label></td>
                <td>slc45slc</td>
                <td>slc0slc</td>
            </tr>
            <tr>
                <td>46</td>
                <td>45</td>
                <td style="padding-left:30px"><input type="checkbox" onchange="slc_checkbox_change(this,0,'slc');" class="slc45slc check1" id="slc46slc"><label for="slc46slc">Araçlar</label></td>
                <td>slc46slc</td>
                <td>slc45slc</td>
            </tr>
            <tr>
                <td>47</td>
                <td>46</td>
                <td style="padding-left:60px"><input type="checkbox" onchange="slc_checkbox_change(this,0,'slc');" class="slc46slc check1" id="slc47slc"><label for="slc47slc">Sol Menü</label></td>
                <td>slc47slc</td>
                <td>slc46slc</td>
            </tr>
            <tr>
                <td>58</td>
                <td>46</td>
                <td style="padding-left:60px"><input type="checkbox" onchange="slc_checkbox_change(this,0,'slc');" class="slc46slc check1" id="slc58slc"><label for="slc58slc">Varsayılan Hesap Planı</label></td>
                <td>slc58slc</td>
                <td>slc46slc</td>
            </tr>
            <tr>
                <td>100</td>
                <td>0</td>
                <td style="padding-left:0px"><input type="checkbox" onchange="slc_checkbox_change(this,0,'slc');" class="slc0slc check1" id="slc100slc"><label for="slc100slc">100</label></td>
                <td>slc100slc</td>
                <td>slc0slc</td>
            </tr>
            <tr>
                <td>101</td>
                <td>100</td>
                <td style="padding-left:30px"><input type="checkbox" onchange="slc_checkbox_change(this,0,'slc');" class="slc100slc check1" id="slc101slc"><label for="slc101slc">100.101</label></td>
                <td>slc101slc</td>
                <td>slc100slc</td>
            </tr>
            <tr>
                <td>102</td>
                <td>100</td>
                <td style="padding-left:30px"><input type="checkbox" onchange="slc_checkbox_change(this,0,'slc');" class="slc100slc check1" id="slc102slc"><label for="slc102slc">100.102</label></td>
                <td>slc102slc</td>
                <td>slc100slc</td>
            </tr>
            <tr>
                <td>103</td>
                <td>102</td>
                <td style="padding-left:60px"><input type="checkbox" onchange="slc_checkbox_change(this,0,'slc');" class="slc102slc check1" id="slc103slc"><label for="slc103slc">100.102.103</label></td>
                <td>slc103slc</td>
                <td>slc102slc</td>
            </tr>
            <tr>
                <td>104</td>
                <td>102</td>
                <td style="padding-left:60px"><input type="checkbox" onchange="slc_checkbox_change(this,0,'slc');" class="slc102slc check1" id="slc104slc"><label for="slc104slc">100.102.104</label></td>
                <td>slc104slc</td>
                <td>slc102slc</td>
            </tr>
            <tr>
                <td>105</td>
                <td>104</td>
                <td style="padding-left:90px"><input type="checkbox" onchange="slc_checkbox_change(this,0,'slc');" class="slc104slc check1" id="slc105slc"><label for="slc105slc">100.102.104.105</label></td>
                <td>slc105slc</td>
                <td>slc104slc</td>
            </tr>
            <tr>
                <td>106</td>
                <td>104</td>
                <td style="padding-left:90px"><input type="checkbox" onchange="slc_checkbox_change(this,0,'slc');" class="slc104slc check1" id="slc106slc"><label for="slc106slc">100.102.104.106</label></td>
                <td>slc106slc</td>
                <td>slc104slc</td>
            </tr>
            <tr>
                <td>107</td>
                <td>106</td>
                <td style="padding-left:120px"><input type="checkbox" onchange="slc_checkbox_change(this,0,'slc');" class="slc106slc check1" id="slc107slc"><label for="slc107slc">100.102.104.106.107</label></td>
                <td>slc107slc</td>
                <td>slc106slc</td>
            </tr>
            <tr>
                <td>108</td>
                <td>106</td>
                <td style="padding-left:120px"><input type="checkbox" onchange="slc_checkbox_change(this,0,'slc');" class="slc106slc check1" id="slc108slc"><label for="slc108slc">100.102.104.106.108</label></td>
                <td>slc108slc</td>
                <td>slc106slc</td>
            </tr>
            <tr>
                <td>109</td>
                <td>108</td>
                <td style="padding-left:150px"><input type="checkbox" onchange="slc_checkbox_change(this,0,'slc');" class="slc108slc check1" id="slc109slc"><label for="slc109slc">100.102.104.106.108.109</label></td>
                <td>slc109slc</td>
                <td>slc108slc</td>
            </tr>
            <tr>
                <td>110</td>
                <td>108</td>
                <td style="padding-left:150px"><input type="checkbox" onchange="slc_checkbox_change(this,0,'slc');" class="slc108slc check1" id="slc110slc"><label for="slc110slc">100.102.104.106.108.110</label></td>
                <td>slc110slc</td>
                <td>slc108slc</td>
            </tr>
        </tbody>
    </table>

</body>

</html>