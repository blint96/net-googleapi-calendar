using System;
using System.Collections.Generic;
using System.Data;
using System.Data.SqlClient;
using System.Linq;
using System.Web;
using System.Web.UI;
using System.Web.UI.WebControls;

namespace webFormsTest.Controls
{
    public partial class cntPracownicy : System.Web.UI.UserControl
    {
        protected void Page_Load(object sender, EventArgs e)
        {

        }

        protected void ListView1_SelectedIndexChanged(object sender, EventArgs e)
        {
            string s = ListView1.SelectedDataKey.Value.ToString();
            //Label1.Text = s;
            //---- select mail
            string connectionString = System.Configuration.ConfigurationManager.
                        ConnectionStrings["test_ConnectionString"].ConnectionString;

            string zmienna = null;
            string queryString =
                    "SELECT google_id FROM dbo.employee where id = " + s;
                    using (SqlConnection connection = new SqlConnection(
                               connectionString))
                    {
                        SqlCommand command = new SqlCommand(
                            queryString, connection);
                        connection.Open();
                        object result = (object)command.ExecuteScalar();

                        zmienna = result.ToString();
                        connection.Close();
                    }
            //--- exec script
                    string fn = String.Format("loadCalendarApiByIDAspx('{0}');", zmienna);

                    //string fn = String.Format("$(document).ready(function() {{loadCalendarApiByIDAspx('{0}');}});", zmienna);
                    //string fn = String.Format(@"$(document).ready(function() {{ setTimeout(function() {{ loadCalendarApiByIDAspx('{0}'); }}, 5000); }});", zmienna);
           //generateCalendarView(calendarContener);
                    //Page.ClientScript.RegisterStartupScript(this.GetType(), "CallMyFunction", fn, true);
                    //Page.ClientScript.RegisterStartupScript(this.GetType(), "CallMyFunction", fn, true);


                    ScriptManager.RegisterStartupScript(UpdatePanel1, UpdatePanel1.GetType(), "CallMyFunction", fn, true);
            


        }

        protected void ListView1_ItemDataBound(object sender, ListViewItemEventArgs e)
        {
            if (e.Item.ItemType == ListViewItemType.DataItem && e.Item.DisplayIndex == ListView1.EditIndex)
            {
                DataRowView drv = e.Item.DataItem as System.Data.DataRowView;
                DropDownList ddl = e.Item.FindControl("DropDownList1") as DropDownList;
                if (ddl != null)
                    ddl.Items.FindByValue(drv["stanowisko_id"].ToString()).Selected = true;

                // Dział
                DropDownList ddl2 = e.Item.FindControl("DropDownList2") as DropDownList;
                if (ddl2 != null)
                    ddl2.Items.FindByValue(drv["dzial_id"].ToString()).Selected = true;
            }
        }

        protected void ListView1_ItemUpdating(object sender, ListViewUpdateEventArgs e)
        {
            DropDownList ddl = ListView1.EditItem.FindControl("DropDownList1") as DropDownList;
            if (ddl != null)
                e.NewValues["stanowisko_id"] = ddl.SelectedValue;

            // Dział
            DropDownList ddl2 = ListView1.EditItem.FindControl("DropDownList2") as DropDownList;
            if (ddl2 != null)
                e.NewValues["dzial_id"] = ddl2.SelectedValue;
        }

        protected void ListView1_ItemInserting(object sender, ListViewInsertEventArgs e)
        {
            DropDownList ddl = ListView1.InsertItem.FindControl("DropDownList1") as DropDownList;
            if (ddl != null)
                e.Values["stanowisko_id"] = ddl.SelectedValue;

            // Dział
            DropDownList ddl2 = ListView1.InsertItem.FindControl("DropDownList2") as DropDownList;
            if (ddl2 != null)
                e.Values["dzial_id"] = ddl2.SelectedValue;

        }

        protected void ListView1_ItemEditing(object sender, ListViewEditEventArgs e)
        {
            /*DropDownList ddl = ListView1.EditItem.FindControl("DropDownList1") as DropDownList;
            if (ddl != null)
                e.NewValues["stanowisko_id"] = ddl.SelectedValue;*/
        }

        protected void ListView1_SelectedIndexChanging(object sender, ListViewSelectEventArgs e)
        {
        }
    }
}