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
    public partial class Form1 : MaterialForm
    {
        SqlConnection con;
        SqlCommand cmd;
        public Form1()
        {
            InitializeComponent();
        }

        private void Button1_Click(object sender, EventArgs e)
        {
            con = new SqlConnection(@"Data Source=FAIRCOM-4192055\SQLSERVER2014;Initial Catalog=martdata;Integrated Security=True");
            con.Open();
            cmd = new SqlCommand("insert into mart values('" +TextBox1.Text+ "','" +TextBox2.Text+ "','" +TextBox4.Text+ "','" +TextBox3.Text+ "','" +TextBox6.Text+ "')",con);
            cmd.ExecuteNonQuery();
            con.Close();
            new Form2().Show(); 

        }

        private void Form1_Load(object sender, EventArgs e)
        {

        }

        private void textBox5_TextChanged(object sender, EventArgs e)
        {

        }

        private void linkLabel2_LinkClicked(object sender, LinkLabelLinkClickedEventArgs e)
        {
            new Form2().Show();
        }

        private void linkLabel1_LinkClicked(object sender, LinkLabelLinkClickedEventArgs e)
        {
            new Form4().Show();
        }
    }
}
