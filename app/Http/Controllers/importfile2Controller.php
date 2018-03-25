<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\fundfileRequest;
use App\Tbimp_list;
use App\tbimp_csvfile;
use Request as Req;
use Excel;
use App\Tbimp_temp;
use File;

class importfileController extends Controller
{

      public function __construct(){
            $this->tmpPath = storage_path() .'/tmp/';
        }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index(Request $request){
            $data=tbimp_list::take(10)->get();
        return view('admin.importfile.index',compact('data','msg'));
     }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
          $data2=tbimp_list::where('idimp',Req::input('idimp'))->first();

        return view('admin.importfile.create',['url'=>'import','idfile'=>0,'data'=>false,'data2'=>$data2]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
     public function store(fundfileRequest $request)
     {


                  print_r( $request->all() );

                   $file = $request->file('filename');
                   $path = 'fileuploads/csv';
                   $fullName = $file->getClientOriginalName();

                  $onlyName = explode('.',$fullName);
                  $newfilename=$request->input('idimp').'_'.date('dmY_Hmmss').'.'.$onlyName[1];
                  $file->move($path,$newfilename);

                  $item = new tbimp_csvfile;
                  $item -> idfile= $request->input('idfile');
                  $item -> filename =  $newfilename;
                  $item -> vday= date('Y-m-d');
                  $item -> countrec= $request->input('countrec');
                  $item -> idoffice= $request->input('idoffice');
                  $item -> idimp= $request->input('idimp');
                  $item -> keydata= $request->input('keydata');
                  $item->save();

                  $filecsv =$path.'/'.$newfilename;
                  $excels =   Excel::load($filecsv,'UTF-8') ;

                      if( !$excels ) return false;
                  		$worksheet 	= $excels->setActiveSheetIndex(0);
                      $lastColumn = $worksheet->getHighestColumn();
                      $rows       = $worksheet->getHighestRow();
                      $excel      = $excels->getActiveSheet();
                      $row        = 1;
                      //echo 'lastColumn ' . $lastColumn;
                      $lastColumn++;
                      $a=0;
                      $b=0;
                      $c=0;
                      $d=0;
                      $e=0;
                      $f=0;
                      $g=0;
                      $h=0;
                      $i=0;
                      $j=0;
                      $k=0;
                      $l=0;
                      $m=0;
                      $n=0;
                      $o=0;
                      $p=0;
                      $q=0;
                      $r=0;
                      $s=0;
                      $t=0;
                      $u=0;
                      $v=0;
                      $w=0;
                      $x=0;
                      $y=0;
                      $z=0;
                      $aa=0;
                      $ab=0;
                      $ac=0;
                      $ad=0;
                      $ae=0;
                      $af=0;
                      $ag=0;
                      $ah=0;
                      $ai=0;
                      $aj=0;
                      $ak=0;
                      $al=0;
                      $am=0;
                      $an=0;
                      $ao=0;
                      $ap=0;
                      $aq=0;
                      $ar=0;
                      $as=0;
                      $at=0;
                      $au=0;
                      $av=0;
                      $aw=0;
                      $ax=0;
                      $ay=0;
                      $az=0;
                      $ba=0;
                      $bb=0;
                      $bc=0;
                      $bd=0;
                      $be=0;
                      $bf=0;
                      $bg=0;
                      $bh=0;
                      $bi=0;
                      $bj=0;
                      $bk=0;
                      $bl=0;
                      $bm=0;
                      $bn=0;
                      $bo=0;
                      $bp=0;
                      $bq=0;
                      $br=0;
                      $bs=0;
                      $bt=0;
                      $bu=0;
                      $bv=0;
                      $bw=0;
                      $bx=0;
                      $by=0;
                      $bz=0;
                      $ca=0;
                      $cb=0;
                      $cc=0;
                      $cd=0;
                      $ce=0;
                      $cf=0;
                      $cg=0;
                      $ch=0;
                      $ci=0;
                      $cj=0;
                      $ck=0;
                      $cl=0;
                      $cm=0;
                      $cn=0;
                      $co=0;
                      $cp=0;
                      $cq=0;
                      $cr=0;
                      $cs=0;
                      $ct=0;
                      $cu=0;
                      $cv=0;
                      $cw=0;
                      $cx=0;
                      $cy=0;
                      $cz=0;
                      $lineid=0;
                      $idoffice=0;
                      $idimp=0;
                      $keydata=0;
                      $mbid=0;
                      $rela=0;

                      for($rx = 1; $rx <= $rows; $rx++){
                          $item = New Tbimp_temp;
                          $a=$excel->getCell("a$rx")->getValue()?$excel->getCell("a$rx")->getValue():$a;
                          $b=$excel->getCell("b$rx")->getValue()?$excel->getCell("b$rx")->getValue():$b;
                          $c=$excel->getCell("c$rx")->getValue()?$excel->getCell("c$rx")->getValue():$c;
                          $d=$excel->getCell("d$rx")->getValue()?$excel->getCell("d$rx")->getValue():$d;
                          $e=$excel->getCell("e$rx")->getValue()?$excel->getCell("e$rx")->getValue():$e;
                          $f=$excel->getCell("f$rx")->getValue()?$excel->getCell("f$rx")->getValue():$f;
                          $g=$excel->getCell("g$rx")->getValue()?$excel->getCell("g$rx")->getValue():$g;
                          $h=$excel->getCell("h$rx")->getValue()?$excel->getCell("h$rx")->getValue():$h;
                          $i=$excel->getCell("i$rx")->getValue()?$excel->getCell("i$rx")->getValue():$i;
                          $j=$excel->getCell("j$rx")->getValue()?$excel->getCell("j$rx")->getValue():$j;
                          $k=$excel->getCell("k$rx")->getValue()?$excel->getCell("k$rx")->getValue():$k;
                          $l=$excel->getCell("l$rx")->getValue()?$excel->getCell("l$rx")->getValue():$l;
                          $m=$excel->getCell("m$rx")->getValue()?$excel->getCell("m$rx")->getValue():$m;
                          $n=$excel->getCell("n$rx")->getValue()?$excel->getCell("n$rx")->getValue():$n;
                          $o=$excel->getCell("o$rx")->getValue()?$excel->getCell("o$rx")->getValue():$o;
                          $p=$excel->getCell("p$rx")->getValue()?$excel->getCell("p$rx")->getValue():$p;
                          $q=$excel->getCell("q$rx")->getValue()?$excel->getCell("q$rx")->getValue():$q;
                          $r=$excel->getCell("r$rx")->getValue()?$excel->getCell("r$rx")->getValue():$r;
                          $s=$excel->getCell("s$rx")->getValue()?$excel->getCell("s$rx")->getValue():$s;
                          $t=$excel->getCell("t$rx")->getValue()?$excel->getCell("t$rx")->getValue():$t;
                          $u=$excel->getCell("u$rx")->getValue()?$excel->getCell("u$rx")->getValue():$u;
                          $v=$excel->getCell("v$rx")->getValue()?$excel->getCell("v$rx")->getValue():$v;
                          $w=$excel->getCell("w$rx")->getValue()?$excel->getCell("w$rx")->getValue():$w;
                          $x=$excel->getCell("x$rx")->getValue()?$excel->getCell("x$rx")->getValue():$x;
                          $y=$excel->getCell("y$rx")->getValue()?$excel->getCell("y$rx")->getValue():$y;
                          $z=$excel->getCell("z$rx")->getValue()?$excel->getCell("z$rx")->getValue():$z;
                          $aa=$excel->getCell("aa$rx")->getValue()?$excel->getCell("aa$rx")->getValue():$aa;
                          $ab=$excel->getCell("ab$rx")->getValue()?$excel->getCell("ab$rx")->getValue():$ab;
                          $ac=$excel->getCell("ac$rx")->getValue()?$excel->getCell("ac$rx")->getValue():$ac;
                          $ad=$excel->getCell("ad$rx")->getValue()?$excel->getCell("ad$rx")->getValue():$ad;
                          $ae=$excel->getCell("ae$rx")->getValue()?$excel->getCell("ae$rx")->getValue():$ae;
                          $af=$excel->getCell("af$rx")->getValue()?$excel->getCell("af$rx")->getValue():$af;
                          $ag=$excel->getCell("ag$rx")->getValue()?$excel->getCell("ag$rx")->getValue():$ag;
                          $ah=$excel->getCell("ah$rx")->getValue()?$excel->getCell("ah$rx")->getValue():$ah;
                          $ai=$excel->getCell("ai$rx")->getValue()?$excel->getCell("ai$rx")->getValue():$ai;
                          $aj=$excel->getCell("aj$rx")->getValue()?$excel->getCell("aj$rx")->getValue():$aj;
                          $ak=$excel->getCell("ak$rx")->getValue()?$excel->getCell("ak$rx")->getValue():$ak;
                          $al=$excel->getCell("al$rx")->getValue()?$excel->getCell("al$rx")->getValue():$al;
                          $am=$excel->getCell("am$rx")->getValue()?$excel->getCell("am$rx")->getValue():$am;
                          $an=$excel->getCell("an$rx")->getValue()?$excel->getCell("an$rx")->getValue():$an;
                          $ao=$excel->getCell("ao$rx")->getValue()?$excel->getCell("ao$rx")->getValue():$ao;
                          $ap=$excel->getCell("ap$rx")->getValue()?$excel->getCell("ap$rx")->getValue():$ap;
                          $aq=$excel->getCell("aq$rx")->getValue()?$excel->getCell("aq$rx")->getValue():$aq;
                          $ar=$excel->getCell("ar$rx")->getValue()?$excel->getCell("ar$rx")->getValue():$ar;
                          $as=$excel->getCell("as$rx")->getValue()?$excel->getCell("as$rx")->getValue():$as;
                          $at=$excel->getCell("at$rx")->getValue()?$excel->getCell("at$rx")->getValue():$at;
                          $au=$excel->getCell("au$rx")->getValue()?$excel->getCell("au$rx")->getValue():$au;
                          $av=$excel->getCell("av$rx")->getValue()?$excel->getCell("av$rx")->getValue():$av;
                          $aw=$excel->getCell("aw$rx")->getValue()?$excel->getCell("aw$rx")->getValue():$aw;
                          $ax=$excel->getCell("ax$rx")->getValue()?$excel->getCell("ax$rx")->getValue():$ax;
                          $ay=$excel->getCell("ay$rx")->getValue()?$excel->getCell("ay$rx")->getValue():$ay;
                          $az=$excel->getCell("az$rx")->getValue()?$excel->getCell("az$rx")->getValue():$az;
                          $ba=$excel->getCell("ba$rx")->getValue()?$excel->getCell("ba$rx")->getValue():$ba;
                          $bb=$excel->getCell("bb$rx")->getValue()?$excel->getCell("bb$rx")->getValue():$bb;
                          $bc=$excel->getCell("bc$rx")->getValue()?$excel->getCell("bc$rx")->getValue():$bc;
                          $bd=$excel->getCell("bd$rx")->getValue()?$excel->getCell("bd$rx")->getValue():$bd;
                          $be=$excel->getCell("be$rx")->getValue()?$excel->getCell("be$rx")->getValue():$be;
                          $bf=$excel->getCell("bf$rx")->getValue()?$excel->getCell("bf$rx")->getValue():$bf;
                          $bg=$excel->getCell("bg$rx")->getValue()?$excel->getCell("bg$rx")->getValue():$bg;
                          $bh=$excel->getCell("bh$rx")->getValue()?$excel->getCell("bh$rx")->getValue():$bh;
                          $bi=$excel->getCell("bi$rx")->getValue()?$excel->getCell("bi$rx")->getValue():$bi;
                          $bj=$excel->getCell("bj$rx")->getValue()?$excel->getCell("bj$rx")->getValue():$bj;
                          $bk=$excel->getCell("bk$rx")->getValue()?$excel->getCell("bk$rx")->getValue():$bk;
                          $bl=$excel->getCell("bl$rx")->getValue()?$excel->getCell("bl$rx")->getValue():$bl;
                          $bm=$excel->getCell("bm$rx")->getValue()?$excel->getCell("bm$rx")->getValue():$bm;
                          $bn=$excel->getCell("bn$rx")->getValue()?$excel->getCell("bn$rx")->getValue():$bn;
                          $bo=$excel->getCell("bo$rx")->getValue()?$excel->getCell("bo$rx")->getValue():$bo;
                          $bp=$excel->getCell("bp$rx")->getValue()?$excel->getCell("bp$rx")->getValue():$bp;
                          $bq=$excel->getCell("bq$rx")->getValue()?$excel->getCell("bq$rx")->getValue():$bq;
                          $br=$excel->getCell("br$rx")->getValue()?$excel->getCell("br$rx")->getValue():$br;
                          $bs=$excel->getCell("bs$rx")->getValue()?$excel->getCell("bs$rx")->getValue():$bs;
                          $bt=$excel->getCell("bt$rx")->getValue()?$excel->getCell("bt$rx")->getValue():$bt;
                          $bu=$excel->getCell("bu$rx")->getValue()?$excel->getCell("bu$rx")->getValue():$bu;
                          $bv=$excel->getCell("bv$rx")->getValue()?$excel->getCell("bv$rx")->getValue():$bv;
                          $bw=$excel->getCell("bw$rx")->getValue()?$excel->getCell("bw$rx")->getValue():$bw;
                          $bx=$excel->getCell("bx$rx")->getValue()?$excel->getCell("bx$rx")->getValue():$bx;
                          $by=$excel->getCell("by$rx")->getValue()?$excel->getCell("by$rx")->getValue():$by;
                          $bz=$excel->getCell("bz$rx")->getValue()?$excel->getCell("bz$rx")->getValue():$bz;
                          $ca=$excel->getCell("ca$rx")->getValue()?$excel->getCell("ca$rx")->getValue():$ca;
                          $cb=$excel->getCell("cb$rx")->getValue()?$excel->getCell("cb$rx")->getValue():$cb;
                          $cc=$excel->getCell("cc$rx")->getValue()?$excel->getCell("cc$rx")->getValue():$cc;
                          $cd=$excel->getCell("cd$rx")->getValue()?$excel->getCell("cd$rx")->getValue():$cd;
                          $ce=$excel->getCell("ce$rx")->getValue()?$excel->getCell("ce$rx")->getValue():$ce;
                          $cf=$excel->getCell("cf$rx")->getValue()?$excel->getCell("cf$rx")->getValue():$cf;
                          $cg=$excel->getCell("cg$rx")->getValue()?$excel->getCell("cg$rx")->getValue():$cg;
                          $ch=$excel->getCell("ch$rx")->getValue()?$excel->getCell("ch$rx")->getValue():$ch;
                          $ci=$excel->getCell("ci$rx")->getValue()?$excel->getCell("ci$rx")->getValue():$ci;
                          $cj=$excel->getCell("cj$rx")->getValue()?$excel->getCell("cj$rx")->getValue():$cj;
                          $ck=$excel->getCell("ck$rx")->getValue()?$excel->getCell("ck$rx")->getValue():$ck;
                          $cl=$excel->getCell("cl$rx")->getValue()?$excel->getCell("cl$rx")->getValue():$cl;
                          $cm=$excel->getCell("cm$rx")->getValue()?$excel->getCell("cm$rx")->getValue():$cm;
                          $cn=$excel->getCell("cn$rx")->getValue()?$excel->getCell("cn$rx")->getValue():$cn;
                          $co=$excel->getCell("co$rx")->getValue()?$excel->getCell("co$rx")->getValue():$co;
                          $cp=$excel->getCell("cp$rx")->getValue()?$excel->getCell("cp$rx")->getValue():$cp;
                          $cq=$excel->getCell("cq$rx")->getValue()?$excel->getCell("cq$rx")->getValue():$cq;
                          $cr=$excel->getCell("cr$rx")->getValue()?$excel->getCell("cr$rx")->getValue():$cr;
                          $cs=$excel->getCell("cs$rx")->getValue()?$excel->getCell("cs$rx")->getValue():$cs;
                          $ct=$excel->getCell("ct$rx")->getValue()?$excel->getCell("ct$rx")->getValue():$ct;
                          $cu=$excel->getCell("cu$rx")->getValue()?$excel->getCell("cu$rx")->getValue():$cu;
                          $cv=$excel->getCell("cv$rx")->getValue()?$excel->getCell("cv$rx")->getValue():$cv;
                          $cw=$excel->getCell("cw$rx")->getValue()?$excel->getCell("cw$rx")->getValue():$cw;
                          $cx=$excel->getCell("cx$rx")->getValue()?$excel->getCell("cx$rx")->getValue():$cx;
                          $cy=$excel->getCell("cy$rx")->getValue()?$excel->getCell("cy$rx")->getValue():$cy;
                          $cz=$excel->getCell("cz$rx")->getValue()?$excel->getCell("cz$rx")->getValue():$cz;

                          $item->a=$a;
                          $item->b=$b;
                          $item->c=$c;
                          $item->d=$d;
                          $item->e=$e;
                          $item->f=$f;
                          $item->g=$g;
                          $item->h=$h;
                          $item->i=$i;
                          $item->j=$j;
                          $item->k=$k;
                          $item->l=$l;
                          $item->m=$m;
                          $item->n=$n;
                          $item->o=$o;
                          $item->p=$p;
                          $item->q=$q;
                          $item->r=$r;
                          $item->s=$s;
                          $item->t=$t;
                          $item->u=$u;
                          $item->v=$v;
                          $item->w=$w;
                          $item->x=$x;
                          $item->y=$y;
                          $item->z=$z;
                          $item->aa=$aa;
                          $item->ab=$ab;
                          $item->ac=$ac;
                          $item->ad=$ad;
                          $item->ae=$ae;
                          $item->af=$af;
                          $item->ag=$ag;
                          $item->ah=$ah;
                          $item->ai=$ai;
                          $item->aj=$aj;
                          $item->ak=$ak;
                          $item->al=$al;
                          $item->am=$am;
                          $item->an=$an;
                          $item->ao=$ao;
                          $item->ap=$ap;
                          $item->aq=$aq;
                          $item->ar=$ar;
                          $item->as=$as;
                          $item->at=$at;
                          $item->au=$au;
                          $item->av=$av;
                          $item->aw=$aw;
                          $item->ax=$ax;
                          $item->ay=$ay;
                          $item->az=$az;
                          $item->ba=$ba;
                          $item->bb=$bb;
                          $item->bc=$bc;
                          $item->bd=$bd;
                          $item->be=$be;
                          $item->bf=$bf;
                          $item->bg=$bg;
                          $item->bh=$bh;
                          $item->bi=$bi;
                          $item->bj=$bj;
                          $item->bk=$bk;
                          $item->bl=$bl;
                          $item->bm=$bm;
                          $item->bn=$bn;
                          $item->bo=$bo;
                          $item->bp=$bp;
                          $item->bq=$bq;
                          $item->br=$br;
                          $item->bs=$bs;
                          $item->bt=$bt;
                          $item->bu=$bu;
                          $item->bv=$bv;
                          $item->bw=$bw;
                          $item->bx=$bx;
                          $item->by=$by;
                          $item->bz=$bz;
                          $item->ca=$ca;
                          $item->cb=$cb;
                          $item->cc=$cc;
                          $item->cd=$cd;
                          $item->ce=$ce;
                          $item->cf=$cf;
                          $item->cg=$cg;
                          $item->ch=$ch;
                          $item->ci=$ci;
                          $item->cj=$cj;
                          $item->ck=$ck;
                          $item->cl=$cl;
                          $item->cm=$cm;
                          $item->cn=$cn;
                          $item->co=$co;
                          $item->cp=$cp;
                          $item->cq=$cq;
                          $item->cr=$cr;
                          $item->cs=$cs;
                          $item->ct=$ct;
                          $item->cu=$cu;
                          $item->cv=$cv;
                          $item->cw=$cw;
                          $item->cx=$cx;
                          $item->cy=$cy;
                          $item->cz=$cz;

                          $item->idimp= $request->input('idimp');
                          $item->idoffice= $request->input('idoffice');

                        $item->save();
                      }
                    //  File::delete( $this->tmpPath . '/import-fund.xlsx');
                          //echo '<br/>';

                  $request->session()->flash('status','บันทึก');

                //?mbid=22178&samano=68827&fundid=3&mbmember=02208&keywords=
              return redirect('import/'.$request->input('mbid').'?samano='.$request->input('samano').'&fundid='.$request->input('fundid').'&mbmember='.$request->input('mbmember').'&keywords='.$request->input('keywords'));
     }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function show($id)
     {
        //  $keywords = $request->input('keywords');
          $samano=Req::input('samano');
          $data2=fund::where('mbid', $id)->first();
           $data=DB::table('fundfile')->join('fundfiletype','fundfile.idfiletype','=','fundfiletype.idfiletype')->where('fundfile.mbid',$id)->get();

         return view('admin.fundfile.show',compact('data','data2'));
     }

    /**
     * Show the form for editing the specified resource.

     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function delete($id){
       $row=fundfile::where('idfile',$id)->first();
       @File::delete('fileuploads/file/'. $row->filename);
       $row->delete();



       return redirect()->back();
     }




}
