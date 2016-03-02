<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">

<html>

<head>

    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <title></title>
    <meta name="generator" content="LibreOffice 5.0.2.2 (Linux)" />
    <meta name="created" content="2016-01-30T13:37:34.995143419" />
    <meta name="changed" content="2016-01-30T14:17:49.963862203" />

    <style type="text/css">
        body,
        div,
        table,
        thead,
        tbody,
        tfoot,
        tr,
        th,
        td,
        p {
            font-family: "Liberation Sans";
            font-size: 14
        }
    </style>

</head>

<body>
    
    @if ($user->getUserType()->cod == 20)

    <p>Este email é um exemplo da funcionalidade de agenda do Project Tracker. Por favor, ignore este email até a lançamento oficial do novo Project Tracker da Delta.</p>
    
    <br><br>
    
    @endif
    
    <table cellspacing="0" border="0">
        <tr>
            <td colspan=2 height="20" align="left" valign=middle><font size=4>Delta Direct</font></td>
            <td colspan=5 align="center" valign=middle><font size=4>Agenda do Mês</font></td>
            <td colspan=3 align="center" valign=middle><font size=4>{{$month}}</font></td>
        </tr>
        <tr>
            <td colspan=10 height="15" align="center" valign=middle>
                <br>
            </td>
        </tr>
        <tr>
            <td colspan=10 rowspan=3 height="45" align="left" valign=top><font size=3>Este e-mail é gerado automaticamente pelos servidores da Delta Faucet Brasil. Por favor, caso tenha alguma dúvida com relação aos itens anuciados nesta notificação, por favor, entre em contato com seu gerente de vendas.</font></td>
        </tr>
        <tr>
        </tr>
        <tr>
        </tr>
        <tr>
            <td colspan=10 height="15" align="center" valign=middle>
                <br>
            </td>
        </tr>
        @if ($user->getUserType()->cod == 10)
        <tr>
            <td colspan=5 height="16" align="left" valign=middle><b>Representante</b></td>
            <td colspan=5 align="left" valign=middle><b>Representação</b></td>
        </tr>
        <tr>
            <td colspan=5 height="15" align="left" valign=middle>{{$user->name . " " . $user->surname}}</td>
            <td colspan=5 align="left" valign=middle>{{$user->representant()->company()->name}}</td>
        </tr>
        <tr>
            <td colspan=5 height="15" align="left" valign=middle>{{$user->email}}</td>
            <td colspan=5 align="left" valign=middle>{{$user->representant()->company()->email}}</td>
        </tr>
        <tr>
            <td colspan=5 height="15" align="left" valign=middle>{{$user->representant()->phone}}</td>
            <td colspan=5 align="left" valign=middle>{{$user->representant()->company()->phone}}</td>
        </tr>
        @else
        <tr>
            <td colspan=10 height="16" align="left" valign=middle><b>Gerente de Vendas</b></td>
        </tr>
        <tr>
            <td colspan=10 height="15" align="left" valign=middle>{{$user->name . " " . $user->surname}}</td>
        </tr>
        <tr>
            <td colspan=10 height="15" align="left" valign=middle>{{$user->email}}</td>
        </tr>
        <tr>
            <td colspan=10 height="15" align="left" valign=middle>{{$user->manager()->phone}}</td>
        </tr>
        @endif
        <tr>
            <td colspan=10 height="15" align="center" valign=middle>
                <br>
            </td>
        </tr>
        <tr>
            <td colspan=10 height="19" align="center" valign=middle><b><font size=3>Projetos</font></b></td>
        </tr>
        @foreach ($projects as $project)
        <tr>
            <td style="border-top: 1px solid #000000; border-left: 1px solid #000000" colspan=5 height="15" align="left" valign=middle>{{$project->title}}</td>
            <td style="border-top: 1px solid #000000; border-right: 1px solid #000000" colspan=5 align="left" valign=middle>{{$project->type()->description}}</td>
        </tr>
        <tr>
            <td style="border-left: 1px solid #000000" colspan=5 height="15" align="left" valign=middle>{{$project->stage()->description}}</td>
            <td style="border-right: 1px solid #000000" colspan=5 align="left" valign=middle>Valor Estimado: R$ {{number_format($project->project_value, 2, ".", ",")}}</td>
        </tr>
        <tr>
            <td style="border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=10 height="15" align="left" valign=middle>Descrição: {{$project->description or ""}}</td>
        </tr>
        @if ($project->project_stage_id == 6)
        <tr>
            <td style="border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=10 rowspan=2 height="30" align="left" valign=middle>Este projeto foi atribuído à você, por favor verique sua página no sistema da Delta para maiores informações.</td>
        </tr>
        @else
        <tr>
            <td style="border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=10 rowspan=2 height="30" align="left" valign=middle>Este projeto entrou na fase {{$project->stage()->description}}, por favor verique sua página no sistema da Delta para maiores informações.</td>
        </tr>
        @endif
        <tr>
        </tr>
        <tr>
            <td style="border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=10 height="15" align="center" valign=middle><a href="http://deltafaucetrep.com/tracker/project/{{$project->project_id}}/detail">Clique aqui para acessá-lo no sistema</a></td>
        </tr>
        <tr>
            <td colspan=10 height="5" align="center" valign=middle>
                <br>
            </td>
        </tr>
        @endforeach
        
    </table>
    <!-- ************************************************************************** -->
</body>

</html>