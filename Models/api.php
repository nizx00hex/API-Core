<?php
function getPageNumber(): int {
    $page = $_GET['page'] ?? null;

    $validatedPage = filter_var(
        $page,
        FILTER_VALIDATE_INT,
        ['options' => ['min_range' => 1]]
    );

    if($validatedPage === false) {
        return 1;
    }
    
    return $validatedPage;
}

// function is_limit_range(mixed $limit): bool {

//     if(!is_numeric($limit)) {
//         return false;
//     }
//     $num = (int)$limit;

//     if($num < 1 || $num > 50) {
//         return false;
//     }

//     return true;
// }
// function getLimitNumber(): int {
//     $limit = $_GET['limit'] ?? null;

//     if(is_limit_range($limit)) {
//         return (int)$limit;
//     } 


//     return 10;
// }



function getLimitNumber(): int {
    $limit = $_GET['limit'] ?? null;

    $validatedPage = filter_var(
        $limit,
        FILTER_VALIDATE_INT,
        [
            'options' => [
                'min_range' => 1,
                'max_range' => 50,
                'default' => 10
            ]
        ]
    );
    return $validatedPage;
}
echo getLimitNumber();


// header('Content-Type: application/json');

// echo json_encode([
//     'requested_page' => getPageNumber(),
//     'message' => 'Pagination sanitized successfully'
// ]);