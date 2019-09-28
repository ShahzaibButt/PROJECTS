using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Windows.Forms;
using System.Data.SqlClient;
using MaterialSkin;
using MaterialSkin.Controls;
using MaterialSkin.Animations;

namespace WindowsFormsApplication1
{
    public partial class Form2 : MaterialForm
    {
        public Form2()
        {
            InitializeComponent();
        }

        private void button1_Click(object sender, EventArgs e)
        {
            SqlConnection con = new SqlConnection(@"Data Source=FAIRCOM-4192055\SQLSERVER2014;Initial Catalog=martdata;Integrated Security=True");  
   SqlDataAdapter sda = new SqlDataAdapter("SELECT COUNT(*) FROM mart WHERE username='"+ textBox1.Text +"' AND password='"+ textBox2.Text +"'",con);  
         
   DataTable dt = new DataTable();
   sda.Fill(dt);  
   if (dt.Rows[0][0].ToString() == "1")  
   {  
      
      this.Hide();  
      new Form5().Show();  
   }  
   else  
   MessageBox.Show("Invalid username or password");  
  
}

        private void button2_Click(object sender, EventArgs e)
        {
            new Form4().Show();
        }

        private void Form2_Load(object sender, EventArgs e)
        {

        }  
        }
    }

