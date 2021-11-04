<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>거래내역 조회하기</title>
</head>
<body>
<form method="get" action="https://testapi.openbanking.or.kr/v2.0/account/transaction_list/fin_num" target="_blank">
        <input type="hidden" name="bank_tran_id" value="MvHYkWGroJ4Na0D8YtZZ6qorLzWjvJ"/>
        <input type="hidden" name="fintech_use_num" value="cf0c9afa-18f4-4f87-a024-3171ad75907f"/>
        <input type="hidden" name="inquiry_type" value="A"/>
        <input type="hidden" name="inquiry_base" value="D"/>
        <input type="hidden" name="from_date" value="20211021"/>
        <input type="hidden" name="to_date" value="20211021"/>
        <input type="hidden" name="sort_order" value="D"/>
        <input type="hidden" name="tran_dtime" value="20211021133030"/>
        <input type="submit" value="거래내역 조회하기"/>
    </form>
</body>
</html>