<!DOCTYPE html>
<html lang="ko">
<head>
    <?php require_once __DIR__ . '/../common.php'; ?>

    <title><?=$config['siteName']?> 관리자 페이지</title>

    <link rel="stylesheet" href="/resource/adm/app.css">
</head>
<body>

    <div class="top-bar">
        <div class="con height-100p flex flex-jc-sb">
            <a href="/" class="logo flex flex-ai-c">
                <i class="fas fa-tachometer-alt"></i>
            </a>

            <nav class="menu-box-1">
                <ul class="flex height-100p">
                    <li><a href="" class="flex flex-ai-c height-100p">홈</a></li>
                    <li><a href="/adm/board/list.php" class="flex flex-ai-c height-100p">게시판관리</a></li>
                    <li><a href="/adm/article/list.php" class="flex flex-ai-c height-100p">게시물관리</a></li>
                    <?php if ( App::isLogined() ) { ?>
                    <li>
                        <a href="/adm/member/doLogout.php" class="flex flex-ai-c height-100p">로그아웃</a>
                    </li>
                    <?php } ?>
                    <li><a href="" class="flex flex-ai-c height-100p">팝업관리</a></li>
                </ul>
            </nav>
        </div>
    </div>

    <h1 class="title-box con">
        <?=$pageTitle?>
    </h1>