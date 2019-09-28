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
   
    public partial class Form3 : MaterialForm
    {
        SqlConnection con;
        SqlCommand cmd;
        SqlDataAdapter da;
        
        public Form3()
        {
            InitializeComponent();
        }

        private void button1_Click(object sender, EventArgs e)
        {
            con = new SqlConnection(@"Data Source=FAIRCOM-4192055\SQLSERVER2014;Initial Catalog=martdata;Integrated Security=True");
            cmd=new SqlCommand("select * from mart",con);
            con.Open();
            da = new SqlDataAdapter(cmd);
            DataTable dt = new DataTable();
            da.Fill(dt);
            BindingSource bs = new BindingSource();
            bs.DataSource = dt;
            dataGridView1.DataSource = bs;
            da.Update(dt);
            

            con.Close();

        }

        private void button2_Click(object sender, EventArgs e)
        {
            con = new SqlConnection(@"Data Source=FAIRCOM-4192055\SQLSERVER2014;Initial Catalog=martdata;Integrated Security=True");
            cmd = new SqlCommand("delete from mart where username='"+textBox1.Text+"'", con);
            con.Open();
            da = new SqlDataAdapter(cmd);
            DataTable dt = new DataTable();
            da.Fill(dt);

            dataGridView1.DataSource = dt;
            da.Update(dt);


            con.Close();

        }

        private void dataGridView1_CellContentClick(object sender, DataGridViewCellEventArgs e)
        {

        }

        private void Form3_Load(object sender, EventArgs e)
        {

        }

        private void button3_Click(object sender, EventArgs e)
        {
            //UPDATE
            new Form6().Show();
        }
    }
}
