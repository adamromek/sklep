    SELECT t.id_towar, t.nazwa, f.data_zak
    FROM towar t
    LEFT  JOIN  (faktura f,  faktura_has_towar thf) /* nie wiem WTF ale tak zostawię */
    ON (t.id_towar=thf.id_towar AND f.id_faktura=thf.id_faktura )
     
    WHERE 
      t.nazwa LIKE '%jakaś niepełna nazwa towaru%' 
      AND (t.id_towar,f.data_zak) IN (SELECT t.id_towar, MAX(f.data_zak) 
      FROM towar t JOIN  (faktura f,  faktura_has_towar thf) ON (t.id_towar=thf.id_towar 
      AND f.id_faktura=thf.id_faktura ) GROUP BY 1) 
    ORDER BY t.nazwa, f.data_zak ASC