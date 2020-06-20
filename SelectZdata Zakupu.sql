    SELECT t.id_towar, t.nazwa, f.data_zak
    FROM towar t
    LEFT  JOIN  (faktura f,  faktura_has_towar thf) 
    ON (t.id_towar=thf.id_towar AND f.id_faktura=thf.id_faktura )
     
    WHERE t.nazwa LIKE '%benek%' 
      AND (t.id_towar,f.data_zak) IN (SELECT t.id_towar, MAX(f.data_zak) 
      FROM towar t JOIN  (faktura f,  faktura_has_towar thf) 
      	ON (t.id_towar=thf.id_towar AND f.id_faktura=thf.id_faktura ) GROUP BY 1) 
    ORDER BY t.nazwa, f.data_zak ASC
    
    <table class="tg">

<thead>
  <tr>
  	 <th class="tg-0lax">Lp</th>
    <th class="tg-0lax">Indeks:</th>
    <th class="tg-0lax">Nazwa towaru</th>
    <th class="tg-0lax">Jm</th>
    <th class="tg-0lax">Ilość</th>
    <th class="tg-0lax">Cena netto zakupu</th>
    <th class="tg-0lax">VAT</th>
    <th class="tg-0lax">PKWiU</th>
    <th class="tg-0lax">Cena brutto sprzedaży</th>
    <th class="tg-0lax">Kod kreskowy</th>
    <th class="tg-0lax">Data zakupów</th>
   </tr>
</thead>
<tbody>
<form>
  <tr>
    <td class="tg-0lax"></td>
    <td class="tg-0lax"><input id="indeks" type="text" name="indeks" /></td>
    <td class="tg-0lax"><input id="nazwa" type="text" name="nazwa" /></td>
    <td class="tg-0lax"><input id="jm" type="text" name="jm" /></td>
    <td class="tg-0lax"><input id="ilosc" type="text" name="ilosc" /></td>
    <td class="tg-0lax"><input id="cena" type="text" name="cena" /> </td>
    <td class="tg-0lax"><input id="vat" type="text" name="vat" /></td>
    <td class="tg-0lax"><input id="pkwiu" type="text" name="pkwiu" /></td>
    <td class="tg-0lax"><input id="cena_brutto" type="text" name="cena_brutto" /></td>
    <td class="tg-0lax"><input id="kodK" type="text" name="kodK" /></td>
    <td class="tg-0lax"><input id="data_Zak" type="text" name="data_Zak" /></td>
    
    
  </tr>
  <input class="btn" type="reset" value="Wyczyść rekord" ></form>
</form> 
</table>