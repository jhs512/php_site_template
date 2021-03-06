<?php
// 관리자 페이지들을 위한 공통 작업
require_once $_SERVER['DOCUMENT_ROOT'] . '/../init/adm.php';

$pageTitle = '게시물 리스트';
// 관리자 페이지 공통 상단
require_once $_SERVER['DOCUMENT_ROOT'] . '/../part/adm/head.php';

$_REQUEST['displayStatus'] = '__ALL__';
$listData = ArticleService::getForPrintListData($_REQUEST);
$articles = $listData['articles'];
$totalPage = $listData['totalPage'];

$boards = ArticleService::getForPrintBoards();
?>

<div class="con table-box">
    <table>
        <colgroup>
            <col width="60">
            <col width="200">
            <col width="150">
            <col>
            <col width="200">
        </colgroup>
        <thead>
            <th>번호</th>
            <th>날짜</th>
            <th>게시판</th>
            <th>노출상태</th>
            <th>이름</th>
            <th>비고</th>
        </thead>
        <tbody>
            <?php foreach ( $articles as $article ) { ?>
            <tr>
                <td><?=$article['id']?></td>
                <td><?=$article['regDate']?></td>
                <td><?=$article['boardName']?></td>
                <td><?=ArticleService::getDisplayStatusName($article['displayStatus'])?></td>
                <td><a href="/adm/article/detail.php?id=<?=$article['id']?>"><?=$article['title']?></a></td>
                <td class="text-align-center">
                    <a href="/adm/article/modify.php?id=<?=$article['id']?>" class="btn btn-success">수정</a>
                    <a onclick="if ( confirm('정말 삭제 하시겠습니까?') == false ) return false;" class="btn btn-danger" href="/adm/article/doDelete.php?id=<?=$article['id']?>">삭제</a>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

<form class="con table-box form1 margin-top-30">
    <table>
        <colgroup>
            <col width="150">
        </colgroup>
        <tbody>
            <tr>
                <th>게시판</th>
                <td>
                    <div class="form-control">
                        <select name="boardId" onchange="this.form.submit();">
                            <option value="">전체</option>
                            <?php foreach ( $boards as $board ) { ?>
                            <?php
                            $selected = $_REQUEST['boardId'] == $board['id'] ? 'selected' : '';
                            ?>
                            <option <?=$selected?> value="<?=$board['id']?>"><?=$board['name']?></option>
                            <?php } ?>
                        </select>
                    </div>
                </td>
            </tr>
            <tr>
                <th>제목</th>
                <td>
                    <div class="form-control">
                        <input type="text" name="title" placeholder="제목" value="<?=getArrValue($_REQUEST, 'title', '')?>">
                    </div>
                </td>
            </tr>
            <tr>
                <th>본문</th>
                <td>
                    <div class="form-control">
                        <input type="text" name="body" placeholder="본문" value="<?=getArrValue($_REQUEST, 'body', '')?>">
                    </div>
                </td>
            </tr>
            <tr>
                <th>검색</th>
                <td>
                    <button type="submit" class="btn btn-primary">검색</button>
                </td>
            </tr>
        </tbody>
    </table>
</form>

<div class="con table-box text-align-center margin-top-30">
    <?php for ( $i = 1; $i <= $totalPage; $i++ ) { ?>
        <a href="<?=getNewUri($_SERVER['REQUEST_URI'], 'page', $i)?>" class="btn"><?=$i?></a>
    <?php } ?>
</div>

<div class="con margin-top-30">
    <a href="/adm/article/write.php" class="btn btn-info">게시물 작성</a>
</div>

<?php
// 관리자 페이지 공통 하단
require_once $_SERVER['DOCUMENT_ROOT'] . '/../part/adm/foot.php';