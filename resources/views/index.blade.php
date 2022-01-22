<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>test</title>
</head>
<body>
    코드연습
</body>

<script>

    var clothes = [["yellowhat", "headgear"], ["bluesunglasses", "eyewear"], ["green_turban", "headgear"]];
    //var clothes =  [["crowmask", "face"], ["bluesunglasses", "face"], ["smoky_makeup", "face"]];
    //var clothes =  [["crowmask", "face"], ["yellowhat", "headgear"], ["bluesunglasses", "eyewear"], ["bluesunglasses", "face"], ["smoky_makeup", "face"]];
    var answer = 0;
    let cnt = 0;

    for(let i=0; i<clothes.length; i++) {

        let j = 1;
        let a = 0;


        if(clothes[i][1] === clothes[j][1]) {
            cnt++;
        }

        if(cnt >= clothes.length) cnt = 0;

        console.log('i : ' + i);
        console.log('j : ' + j);
        console.log('cnt : ' + cnt);

        answer = answer + i;
        answer = anwer = cnt;
        j++;

        if(j > clothes.length) break;

    }

    document.write(answer);



</script>
</html>
