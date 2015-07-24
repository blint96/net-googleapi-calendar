<%@ Control Language="C#" AutoEventWireup="true" CodeBehind="cntStanowiska.ascx.cs" Inherits="webFormsTest.Controls.cntStanowiska" %>
<asp:ListView ID="ListView1" runat="server" DataKeyNames="id" DataSourceID="SqlDataSource1" InsertItemPosition="LastItem">
    <AlternatingItemTemplate>
        <tr style="background-color: #FFFFFF;color: #284775;">
            <td>
                <asp:Button ID="DeleteButton" runat="server" CommandName="Delete" Text="Delete" />
                <asp:Button ID="EditButton" runat="server" CommandName="Edit" Text="Edit" />
            </td>
            <td>
                <asp:Label ID="idLabel" runat="server" Text='<%# Eval("id") %>' />
            </td>
            <td>
                <asp:Label ID="nazwaLabel" runat="server" Text='<%# Eval("nazwa") %>' />
            </td>
        </tr>
    </AlternatingItemTemplate>
    <EditItemTemplate>
        <tr style="background-color: #999999;">
            <td>
                <asp:Button ID="UpdateButton" runat="server" CommandName="Update" Text="Update" />
                <asp:Button ID="CancelButton" runat="server" CommandName="Cancel" Text="Cancel" />
            </td>
            <td>
                <asp:Label ID="idLabel1" runat="server" Text='<%# Eval("id") %>' />
            </td>
            <td>
                <asp:TextBox ID="nazwaTextBox" runat="server" Text='<%# Bind("nazwa") %>' />
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
            <td>&nbsp;</td>
            <td>
                <asp:TextBox ID="nazwaTextBox" runat="server" Text='<%# Bind("nazwa") %>' />
            </td>
        </tr>
    </InsertItemTemplate>
    <ItemTemplate>
        <tr style="background-color: #E0FFFF;color: #333333;">
            <td>
                <asp:Button ID="DeleteButton" runat="server" CommandName="Delete" Text="Delete" />
                <asp:Button ID="EditButton" runat="server" CommandName="Edit" Text="Edit" />
            </td>
            <td>
                <asp:Label ID="idLabel" runat="server" Text='<%# Eval("id") %>' />
            </td>
            <td>
                <asp:Label ID="nazwaLabel" runat="server" Text='<%# Eval("nazwa") %>' />
            </td>
        </tr>
    </ItemTemplate>
    <LayoutTemplate>
        <table runat="server">
            <tr runat="server">
                <td runat="server">
                    <table id="itemPlaceholderContainer" runat="server" border="1" style="background-color: #FFFFFF;border-collapse: collapse;border-color: #999999;border-style:none;border-width:1px;font-family: Verdana, Arial, Helvetica, sans-serif;">
                        <tr runat="server" style="background-color: #E0FFFF;color: #333333;">
                            <th runat="server"></th>
                            <th runat="server">id</th>
                            <th runat="server">nazwa</th>
                        </tr>
                        <tr id="itemPlaceholder" runat="server">
                        </tr>
                    </table>
                </td>
            </tr>
            <tr runat="server">
                <td runat="server" style="text-align: center;background-color: #5D7B9D;font-family: Verdana, Arial, Helvetica, sans-serif;color: #FFFFFF">
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
        <tr style="background-color: #E2DED6;font-weight: bold;color: #333333;">
            <td>
                <asp:Button ID="DeleteButton" runat="server" CommandName="Delete" Text="Delete" />
                <asp:Button ID="EditButton" runat="server" CommandName="Edit" Text="Edit" />
            </td>
            <td>
                <asp:Label ID="idLabel" runat="server" Text='<%# Eval("id") %>' />
            </td>
            <td>
                <asp:Label ID="nazwaLabel" runat="server" Text='<%# Eval("nazwa") %>' />
            </td>
        </tr>
    </SelectedItemTemplate>
</asp:ListView>
<asp:SqlDataSource ID="SqlDataSource1" runat="server" ConnectionString="<%$ ConnectionStrings:test_ConnectionString %>" DeleteCommand="DELETE FROM [stanowiska] WHERE [id] = @id" InsertCommand="INSERT INTO [stanowiska] ([nazwa]) VALUES (@nazwa)" SelectCommand="SELECT * FROM [stanowiska]" UpdateCommand="UPDATE [stanowiska] SET [nazwa] = @nazwa WHERE [id] = @id">
    <DeleteParameters>
        <asp:Parameter Name="id" Type="Int32" />
    </DeleteParameters>
    <InsertParameters>
        <asp:Parameter Name="nazwa" Type="Int32" />
    </InsertParameters>
    <UpdateParameters>
        <asp:Parameter Name="nazwa" Type="String" />
        <asp:Parameter Name="id" Type="Int32" />
    </UpdateParameters>
</asp:SqlDataSource>

