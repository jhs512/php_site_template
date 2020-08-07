<?php

class ArticleService {
    public static function getForPrintBoards(): array {
        return ArticleDao::getForPrintBoards();
    }

    public static function getBoardByCode(string $id) {
        return ArticleDao::getBoardByCode($id);
    }

    public static function getBoardById(int $id) {
        return ArticleDao::getBoardById($id);
    }

    public static function deleteBoard(int $id) {
        ArticleDao::deleteBoard($id);
    }

    public static function makeBoard($args) : int {
        return ArticleDao::makeBoard($args);
    }

    public static function modifyBoard($args) {
        return ArticleDao::modifyBoard($args);
    }

    public static function writeArticle($args) : int {
        return ArticleDao::writeArticle($args);
    }

    public static function getDisplayStatusName(int $displayStatus) : string {
        if ( $displayStatus == 1 ) {
            return '노출';
        }

        return '미노출';
    }

    public static function getForPrintListData($args) {
        if ( isE($args, 'displayStatus') == false ) {
            $args['displayStatus'] = 1;
        }

        $totalCount = ArticleDao::getForPrintListArticlesCount($args);
        $itemsInAPage = 5;
        $page = getArrValue($args, 'page', 1);

        $limitFrom = $itemsInAPage * ($page - 1);
        $limitTake = $itemsInAPage;

        $args['limitFrom'] = $limitFrom;
        $args['limitTake'] = $limitTake;

        $articles = ArticleDao::getForPrintListArticles($args);

        $rsData = [];
        $rsData['articles'] = $articles;
        $rsData['page'] = $page;
        $rsData['totalCount'] = $totalCount;
        $rsData['totalPage'] = ceil($rsData['totalCount'] / $itemsInAPage);

        return $rsData;
    }
}