<%@ Page language="C#" %>
<%@ Register src="Controls/cntDzialy.ascx" tagname="cntDzialy" tagprefix="uc1" %>
<%@ Register src="Controls/cntStanowiska.ascx" tagname="cntStanowiska" tagprefix="uc2" %>
<form id="form1" runat="server">
    Konfiguracja<uc1:cntDzialy ID="cntDzialy1" runat="server" />
    <br />
    <br />
    Stanowiska<uc2:cntStanowiska ID="cntStanowiska1" runat="server" />
</form>

