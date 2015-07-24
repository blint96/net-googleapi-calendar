<%@ Control Language="C#" AutoEventWireup="true" CodeBehind="cntPracownicy.ascx.cs" Inherits="webFormsTest.Controls.cntPracownicy" %>

<asp:UpdatePanel ID="UpdatePanel1" runat="server">
    <ContentTemplate>


<!-- co by chociaż ręce i nogi to miało -->
<div style="width: 90%; margin: 0 auto;">
<asp:ListView ID="ListView1" runat="server" DataKeyNames="id" DataSourceID="SqlDataSource1" InsertItemPosition="LastItem" 
    OnSelectedIndexChanged="ListView1_SelectedIndexChanged" OnItemDataBound="ListView1_ItemDataBound" OnItemEditing="ListView1_ItemEditing" OnItemInserting="ListView1_ItemInserting" OnItemUpdating="ListView1_ItemUpdating" OnSelectedIndexChanging="ListView1_SelectedIndexChanging">
    <AlternatingItemTemplate>
        <tr style="background-color: #FFF8DC; ">
            <td>
                <asp:Button ID="DeleteButton" runat="server" CommandName="Delete" Text="Delete" type="button" />
                <asp:Button ID="EditButton" runat="server" CommandName="Edit" Text="Edit" />
                <asp:Button ID="Button1" runat="server" CommandName="Select" Text="Select" type="button"/>
            </td>
            <td>
                <asp:Label ID="nazwiskoLabel" runat="server" Text='<%# Eval("nazwisko") %>' />
            </td>
            <td>
                <asp:Label ID="imieLabel" runat="server" Text='<%# Eval("imie") %>' />
            </td>
            <td>
                <asp:Label ID="nazwaLabel" runat="server" Text='<%# Eval("stanowisko") %>' />
            </td>
            <td>
                <asp:Label ID="nazwa1Label" runat="server" Text='<%# Eval("dzial") %>' />
            </td>
            <td>
                <asp:CheckBox ID="zatrudnionyCheckBox" runat="server" Checked='<%# Eval("zatrudniony") %>' Enabled="false" />
            </td>
            <td>
                <asp:TextBox ID="google_idLabel" runat="server" Text='<%# Eval("google_id") %>' />
            </td>
        </tr>
    </AlternatingItemTemplate>
    <EditItemTemplate>
        <tr style="background-color: #008A8C; color: #FFFFFF;">
            <td>
                <asp:Button ID="UpdateButton" runat="server" CommandName="Update" Text="Update" />
                <asp:Button ID="CancelButton" runat="server" CommandName="Cancel" Text="Cancel" />
            </td>
            <td>
                <asp:TextBox ID="nazwiskoTextBox" runat="server" Text='<%# Bind("nazwisko") %>' />
            </td>
            <td>
                <asp:TextBox ID="imieTextBox" runat="server" Text='<%# Bind("imie") %>' />
            </td>
            <td>
                <asp:DropDownList ID="DropDownList1" runat="server" DataSourceID="SqlDataSource3" DataTextField="nazwa" DataValueField="id">
                </asp:DropDownList>
            </td>
            <td>
                <asp:DropDownList ID="DropDownList2" runat="server" DataSourceID="SqlDataSource2" DataTextField="nazwa" DataValueField="id">
                </asp:DropDownList>
            </td>
            <td>
                <asp:CheckBox ID="zatrudnionyCheckBox" runat="server" Checked='<%# Bind("zatrudniony") %>' />
            </td>
            <td>
                <asp:TextBox ID="google_idTextBox" runat="server" Text='<%# Bind("google_id") %>' />
            </td>
        </tr>
    </EditItemTemplate>
    <EmptyDataTemplate>
        <table runat="server" style="background-color: #FFFFFF;border-collapse: collapse;border-color: #999999;border-style:none;border-width:1px;">
            <tr>
                <td>No data was returned.</td>
            </tr>
        </table>
    </EmptyDataTemplate>
    <InsertItemTemplate>
        <tr style="">
            <td>
                <asp:Button ID="InsertButton" runat="server" CommandName="Insert" Text="Insert" />
                <asp:Button ID="CancelButton" runat="server" CommandName="Cancel" Text="Clear" />
            </td>
            <td>
                <asp:TextBox ID="nazwiskoTextBox" runat="server" Text='<%# Bind("nazwisko") %>' />
            </td>
            <td>
                <asp:TextBox ID="imieTextBox" runat="server" Text='<%# Bind("imie") %>' />
            </td>
            <td>
                <asp:DropDownList ID="DropDownList1" runat="server" DataSourceID="SqlDataSource3" DataTextField="nazwa" DataValueField="id">
                </asp:DropDownList>
            </td>
            <td>
                <asp:DropDownList ID="DropDownList2" runat="server" DataSourceID="SqlDataSource2" DataTextField="nazwa" DataValueField="id">
                </asp:DropDownList>
            </td>
            <td>
                <asp:CheckBox ID="zatrudnionyCheckBox" runat="server" Checked='<%# Bind("zatrudniony") %>' />
            </td>
            <td>
                <asp:TextBox ID="google_idTextBox" runat="server" Text='<%# Bind("google_id") %>' />
            </td>
        </tr>
    </InsertItemTemplate>
    <ItemTemplate>
        <tr style="background-color: #DCDCDC; color: #000000;">
            <td>
                <asp:Button ID="DeleteButton" runat="server" CommandName="Delete" Text="Delete" />
                <asp:Button ID="EditButton" runat="server" CommandName="Edit" Text="Edit" />
                <asp:Button ID="Button1" runat="server" CommandName="Select" Text="Select" type="button" />
            </td>
            <td>
                <asp:Label ID="nazwiskoLabel" runat="server" Text='<%# Eval("nazwisko") %>' />
            </td>
            <td>
                <asp:Label ID="imieLabel" runat="server" Text='<%# Eval("imie") %>' />
            </td>
            <td>
                <asp:Label ID="nazwaLabel" runat="server" Text='<%# Eval("stanowisko") %>' />
            </td>
            <td>
                <asp:Label ID="nazwa1Label" runat="server" Text='<%# Eval("dzial") %>' />
            </td>
            <td>
                <asp:CheckBox ID="zatrudnionyCheckBox" runat="server" Checked='<%# Eval("zatrudniony") %>' Enabled="false" />
            </td>
            <td>
                <asp:Label ID="google_idLabel" runat="server" Text='<%# Eval("google_id") %>' />
            </td>
            
        </tr>
    </ItemTemplate>
    <LayoutTemplate>
        <table runat="server">
            <tr runat="server">
                <td runat="server">
                    <table id="itemPlaceholderContainer" runat="server" border="1" style="background-color: #FFFFFF;border-collapse: collapse;border-color: #999999;border-style:none;border-width:1px;font-family: Verdana, Arial, Helvetica, sans-serif;">
                        <tr runat="server" style="background-color: #DCDCDC; color: #000000;">
                            <th runat="server"></th>
                            <th runat="server">nazwisko</th>
                            <th runat="server">imie</th>
                            <th runat="server">nazwa</th>
                            <th runat="server">nazwa1</th>
                            <th runat="server">zatrudniony</th>
                            <th runat="server">google_id</th>
                        </tr>
                        <tr id="itemPlaceholder" runat="server">
                        </tr>
                    </table>
                </td>
            </tr>
            <tr runat="server">
                <td runat="server" style="text-align: center;background-color: #CCCCCC; font-family: Verdana, Arial, Helvetica, sans-serif;color: #000000">
                    <asp:DataPager ID="DataPager1" runat="server">
                        <Fields>
                            <asp:NextPreviousPagerField ButtonType="Button" ShowFirstPageButton="True" ShowLastPageButton="True" />
                        </Fields>
                    </asp:DataPager>
                </td>
            </tr>
        </table>
    </LayoutTemplate>
    <SelectedItemTemplate>
        <tr style="background-color: #008A8C; font-weight: bold;color: #FFFFFF;">
            <td>
                <asp:Button ID="DeleteButton" runat="server" CommandName="Delete" Text="Delete" />
                <asp:Button ID="EditButton" runat="server" CommandName="Edit" Text="Edit" />
            </td>
            <td>
                <asp:Label ID="nazwiskoLabel" runat="server" Text='<%# Eval("nazwisko") %>' />
            </td>
            <td>
                <asp:Label ID="imieLabel" runat="server" Text='<%# Eval("imie") %>' />
            </td>
            <td>
                <asp:Label ID="nazwaLabel" runat="server" Text='<%# Eval("stanowisko") %>' />
            </td>
            <td>
                <asp:Label ID="nazwa1Label" runat="server" Text='<%# Eval("dzial") %>' />
            </td>
            <td>
                <asp:CheckBox ID="zatrudnionyCheckBox" runat="server" Checked='<%# Eval("zatrudniony") %>' Enabled="false" />
            </td>
            <td>
                <asp:Label ID="google_idLabel" runat="server" Text='<%# Eval("google_id") %>' />
            </td>
            
        </tr>
    </SelectedItemTemplate>
</asp:ListView>
</div>
<asp:SqlDataSource ID="SqlDataSource1" runat="server" ConnectionString="<%$ ConnectionStrings:test_ConnectionString %>" 
    DeleteCommand="DELETE FROM [employee] WHERE [id] = @id" 
    InsertCommand="INSERT INTO [employee] ([nazwisko], [imie], [dzial_id], [stanowisko_id], [zatrudniony], [google_id]) VALUES 
                (@nazwisko, @imie, @dzial_id, @stanowisko_id, @zatrudniony, @google_id)" 
    SelectCommand="select a.id, a.nazwisko, a.imie, a.dzial_id, a.stanowisko_id, s.nazwa as stanowisko, d.nazwa as dzial, a.zatrudniony, a.google_id 
                    from employee a
                    left join stanowiska s on s.id = a.stanowisko_id
                    left join dzialy d on d.id = a.dzial_id
                " 
    UpdateCommand="UPDATE employee SET nazwisko = @nazwisko, imie = @imie, dzial_id = @dzial_id, stanowisko_id = @stanowisko_id, zatrudniony = @zatrudniony, google_id = @google_id 
    WHERE (id = @id)">
    <DeleteParameters>
        <asp:Parameter Name="id" Type="Int32" />
    </DeleteParameters>
    <InsertParameters>
        <asp:Parameter Name="nazwisko" Type="String" />
        <asp:Parameter Name="imie" Type="String" />
        <asp:Parameter Name="dzial_id" Type="Int32" />
        <asp:Parameter Name="stanowisko_id" Type="Int32" />
        <asp:Parameter Name="zatrudniony" Type="Boolean" />
        <asp:Parameter Name="google_id" type="String"/>
    </InsertParameters>
    <UpdateParameters>
        <asp:Parameter Name="nazwisko" Type="String" />
        <asp:Parameter Name="imie" Type="String" />
        <asp:Parameter Name="dzial_id" Type="Int32" />
        <asp:Parameter Name="stanowisko_id" Type="Int32" />
        <asp:Parameter Name="zatrudniony" Type="Boolean" />
        <asp:Parameter Name="google_id" Type="String" />
        <asp:Parameter Name="id" Type="Int32" />
    </UpdateParameters>
</asp:SqlDataSource>

<asp:SqlDataSource ID="SqlDataSource3" runat="server" ConnectionString="<%$ ConnectionStrings:test_ConnectionString %>" 
    SelectCommand="SELECT * FROM [stanowiska] ORDER BY [nazwa]"></asp:SqlDataSource>



<asp:SqlDataSource ID="SqlDataSource2" runat="server" ConnectionString="<%$ ConnectionStrings:test_ConnectionString %>" 
    SelectCommand="SELECT * FROM [dzialy] ORDER BY [nazwa]"></asp:SqlDataSource>
    </ContentTemplate>
</asp:UpdatePanel>




