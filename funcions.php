<?php


function creaCalendari($mes,$any, $festius)
{
    $nomMes = date("F", mktime(0, 0, 0, $mes, 10));

    return('<div class="container">
    <div class="row">
      <div class="span12 bg-gradient-light">
            <table class="table-condensed table-bordered table-striped table-light" style="text-align: center;">
                  <thead>
                      <tr>
                        <th colspan="7" >
                          <a class="btn"><i class="icon-chevron-left"></i></a>
                          <a class="btn">'.$nomMes.' '.$any.'</a>
                          <a class="btn"><i class="icon-chevron-right"></i></a>
                        </th>
                      </tr>
                      <tr>
                          <th>Dl</th>
                          <th>Dm</th>
                          <th>Dm</th>
                          <th>Dj</th>
                          <th>Dv</th>
                          <th>Ds</th>
                          <th>Dg</th>
                      </tr>
                  </thead>
                  <tbody>
                  '.creaDies($mes,$any,$festius).'
                  </tbody>
              </table>    
      </div>
    </div>
  </div>
  ');

}

function creaDies($mes,$any,$festius)
{
    $result = "";
    $nullDays = returnFirstDay($mes,$any);
    $day = 1;

    $d = new DateTime( $any.'-'.$mes.'-1' ); 
    $d =$d->format( 't' );

    while($day<$d)
    {
        $result = $result.'<tr>';
        for($j = 0;$j <7;$j++)
        {
            if($nullDays>0 || $day>$d)
            {
                $result = $result.'<td>-</td>';
                $nullDays--;
            }
            else{
                if($day==date('j'))
                {
                    $result = $result.'<td bgcolor="#000000"><font color="#FFFFFF">'.$day.'</font></td>';
                }
                else if(isOnArray($festius,$day))
                {
                    $result = $result.'<td bgcolor="#FF0000"><font color="#FFFFFF">'.$day.'</font></td>'; 
                }
                else
                {
                    $result = $result.'<td>'.$day.'</td>';
                }
                $day++;
            }
        }
        $result = $result.'</tr>';
    }

    return($result);
};

function isOnArray($festius,$dia)
{
    $res = false;
    foreach($festius as $valor)
    {
        if($valor==$dia)$res = true;
    }
    return $res;
}

function returnFirstDay($mes,$any)
{
    return date('N', strtotime(date($any.'-'.$mes.'-1')))-1;
}
