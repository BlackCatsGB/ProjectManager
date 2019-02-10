SELECT concat(concat(IFNULL(d2.id,d1.id),'.'),IFNULL(d2.id-d2.id+d1.id,'!')) as ord,
	d2.id as pid,
    d2.text as ptext,
    d1.id as id,
    d1.text as text
FROM demands d1 LEFT JOIN demands d2 on d1.id=d2.id_parent
order by ord;