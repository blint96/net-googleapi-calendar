<%@ Page Title="" Language="C#" MasterPageFile="~/Site.Master" AutoEventWireup="true" CodeBehind="Pracownicy2.aspx.cs" Inherits="webFormsTest.Pracownicy2" %>
<%@ Register src="Controls/cntPracownicy.ascx" tagname="cntPracownicy" tagprefix="uc1" %>
<%@ Register src="Controls/cntKalendarz.ascx" tagname="cntKalendarz" tagprefix="uc2" %>
<asp:Content ID="Content1" ContentPlaceHolderID="head" runat="server">

    <link href='http://fonts.googleapis.com/css?family=Economica' rel='stylesheet' type='text/css'>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css">
    <!-- Respomsive slider -->
    <link href="<%= ResolveUrl("~/Style/responsive-calendar.css")%>" rel="stylesheet">
    <link href="<%= ResolveUrl("~/Style/calendar7.css")%>" rel="stylesheet">
    <!-- Czcionka -->
    <link href="<%= ResolveUrl("~/Style/bootstrap-dialog.css")%>" rel="stylesheet"/>
    <link href="<%= ResolveUrl("~/Style/bootstrap-dialog.less")%>" rel="stylesheet/less"/>

    <!-- Datetimer picker NOWE -->
    <link href="<%= ResolveUrl("~/Style/bootstrap-datetimepicker.css")%>" rel="stylesheet" />
    <link href="<%= ResolveUrl("~/Style/bootstrap-datepicker.css")%>" rel="stylesheet" />

    
</asp:Content>
<asp:Content ID="Content3" ContentPlaceHolderID="ContentPlaceHolder1" runat="server">

    <uc1:cntPracownicy ID="cntPracownicy1" runat="server" />
    <uc2:cntKalendarz ID="cntKalendarz1" runat="server" />

    <script>
      var datestart = "<div class='input-group date' id='datetimestart'><input type='text' class='form-control' id='start-input' /><span class='input-group-addon'><span class='glyphicon glyphicon-calendar'></span></span></div>";
      var dateend = "<div class='input-group date' id='datetimeend'><input type='text' class='form-control' id='end-input' /><span class='input-group-addon'><span class='glyphicon glyphicon-calendar'></span></span></div>";
    
      var modal = document.getElementById('date-placement');
      modal.innerHTML = datestart + "<p>" + dateend;
    </script>
    <script src="<%= ResolveUrl("~/Scripts/jquery.js")%>"></script>
    <script src="<%= ResolveUrl("~/Scripts/moment.js")%>"></script>                      <!-- nowe -->
    <script src="<%= ResolveUrl("~/Scripts/bootstrap.min.js")%>"></script>
    <script src="<%= ResolveUrl("~/Scripts/bootstrap-dialog.js")%>"></script>
    <script src="<%= ResolveUrl("~/Scripts/bootstrap-datetimepicker.js")%>"></script>    <!-- nowe -->
    <script type="text/javascript">
            $(function () {
                $('#datetimestart').datetimepicker();
                $('#datetimeend').datetimepicker();
            });
    </script>
    <script src="<%= ResolveUrl("~/Scripts/calendar7.js")%>"></script>
    <script src="<%= ResolveUrl("~/Scripts/googleapi.js")%>"></script>
    <script src="https://apis.google.com/js/client.js?onload=checkAuth"></script>

    <script>
        // Tooltip
        $(document).ready(function () {
            // Tooltip only Text
            $('.masterTooltip').hover(function () {
                // Hover over code
                var title = $(this).attr('title');
                $(this).data('tipText', title).removeAttr('title');
                $('<p class="tooltip"></p>')
                .text(title)
                .appendTo('body')
                .fadeIn('slow');
            }, function () {
                // Hover out code
                $(this).attr('title', $(this).data('tipText'));
                $('.tooltip').remove();
            }).mousemove(function (e) {
                var mousex = e.pageX + 20; //Get X coordinates
                var mousey = e.pageY + 10; //Get Y coordinates
                $('.tooltip')
                .css({ top: mousey, left: mousex })
            });
        });
    </script>

</asp:Content>
