<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class board extends Model
{
    use HasFactory;

    protected $table = "boards";
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'audit_trail'
    ];


    public function __construct()
    {
        parent::__construct();

        $this->board = DB::table('boards');
    }

    /**
     * write
     * @title 글쓰기
     * @param array $param
     * @return int insertid
     */
    public function write($param) {

        if( $this->board->insertGetId($param) ) {
            return $this->board->insertGetId($param);
        }
        return null;
    }

    /**
     * modify
     * @title 수정하기
     * @param array $param, int $id
     * @return bool
     */
    public function modify($param, $id) {

        if( $this->board->where('id', $id)->update($param) == TRUE ) {
            return TRUE;
        }
        return FALSE;
    }

    /**
     * load
     * @title 상세보기
     * @param  int $id, $mode
     * @return row
     */
    public function loadData($id, $mode) {

        if($mode == 'load') {
            $this->_increase();
        }

        return $this->board->find($id);
    }

    /**
     * retrieve
     * @title boards list
     * @param 검색, 현재 페이지, offset페이지
     * @return list
     */
    public function retrieve() {

        return $this->board->get();
    }

    /**
     * remove
     * @title 레코드 삭제
     * @param  mixed $id
     * @return bool
     */
    public function remove($id) {

        if( $this->board->where('id', $id)->delete() == TRUE ) {
            return TRUE;
        }
        return FALSE;
    }


    /**
     * total
     * @title boards list 레코드 개수
     * @param 검색
     * @return int count
     */
    public function total() {

        return $this->board->count();
    }

    /**
     * _increase
     * @title 조회수 증가
     * @return void
     */
    private function _increase() {

        $this->board->increment('cnt');
    }


    /**
     * newCount
     * @title LNB 새글 개수 표시
     * @return int count
     */
    public static function newCount() {

        return DB::table('boards')->whereRaw(' substr(created_at, 1, 10) = substr(now(), 1, 10) ')->count();
    }

    /**
     * setCreated_at
     * @title 등록일 날짜 포맷 변경
     * @param  mixed $created_at
     * @return date
     */
    public function setCreated_at($created_at) {

        return date("Y-m-d", strtotime($created_at));
    }


    /**
     * displayNew
     * @title 레코드 새글 표시
     * @param  mixed $created_at
     * @return string
     */
    public function displayNew($created_at) {
        //하루 단위
		$time = substr($created_at,0, 10);
		$today = date("Y-m-d");

        if($time == $today)
        {
            return " <span id='new'>new</span>";
        }

        return '';
    }


}
