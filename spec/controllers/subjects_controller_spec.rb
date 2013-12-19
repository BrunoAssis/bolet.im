require 'spec_helper'

# This spec was generated by rspec-rails when you ran the scaffold generator.
# It demonstrates how one might use RSpec to specify the controller code that
# was generated by Rails when you ran the scaffold generator.
#
# It assumes that the implementation code is generated by the rails scaffold
# generator.  If you are using any extension libraries to generate different
# controller code, this generated spec may or may not pass.
#
# It only uses APIs available in rails and/or rspec-rails.  There are a number
# of tools you can use to make these specs even more expressive, but we're
# sticking to rails and rspec-rails APIs to keep things simple and stable.
#
# Compared to earlier versions of this generator, there is very limited use of
# stubs and message expectations in this spec.  Stubs are only used when there
# is no simpler way to get a handle on the object needed for the example.
# Message expectations are only used when there is no simpler way to specify
# that an instance is receiving a specific message.

describe SubjectsController do

  # This should return the minimal set of attributes required to create a valid
  # Subject. As you add validations to Subject, be sure to
  # adjust the attributes here as well.
  let(:valid_attributes) { { "school" => "" } }

  # This should return the minimal set of values that should be in the session
  # in order to pass any filters (e.g. authentication) defined in
  # SubjectsController. Be sure to keep this updated too.
  let(:valid_session) { {} }

  describe "GET index" do
    it "assigns all subjects as @subjects" do
      subject = Subject.create! valid_attributes
      get :index, {}, valid_session
      assigns(:subjects).should eq([subject])
    end
  end

  describe "GET show" do
    it "assigns the requested subject as @subject" do
      subject = Subject.create! valid_attributes
      get :show, {:id => subject.to_param}, valid_session
      assigns(:subject).should eq(subject)
    end
  end

  describe "GET new" do
    it "assigns a new subject as @subject" do
      get :new, {}, valid_session
      assigns(:subject).should be_a_new(Subject)
    end
  end

  describe "GET edit" do
    it "assigns the requested subject as @subject" do
      subject = Subject.create! valid_attributes
      get :edit, {:id => subject.to_param}, valid_session
      assigns(:subject).should eq(subject)
    end
  end

  describe "POST create" do
    describe "with valid params" do
      it "creates a new Subject" do
        expect {
          post :create, {:subject => valid_attributes}, valid_session
        }.to change(Subject, :count).by(1)
      end

      it "assigns a newly created subject as @subject" do
        post :create, {:subject => valid_attributes}, valid_session
        assigns(:subject).should be_a(Subject)
        assigns(:subject).should be_persisted
      end

      it "redirects to the created subject" do
        post :create, {:subject => valid_attributes}, valid_session
        response.should redirect_to(Subject.last)
      end
    end

    describe "with invalid params" do
      it "assigns a newly created but unsaved subject as @subject" do
        # Trigger the behavior that occurs when invalid params are submitted
        Subject.any_instance.stub(:save).and_return(false)
        post :create, {:subject => { "school" => "invalid value" }}, valid_session
        assigns(:subject).should be_a_new(Subject)
      end

      it "re-renders the 'new' template" do
        # Trigger the behavior that occurs when invalid params are submitted
        Subject.any_instance.stub(:save).and_return(false)
        post :create, {:subject => { "school" => "invalid value" }}, valid_session
        response.should render_template("new")
      end
    end
  end

  describe "PUT update" do
    describe "with valid params" do
      it "updates the requested subject" do
        subject = Subject.create! valid_attributes
        # Assuming there are no other subjects in the database, this
        # specifies that the Subject created on the previous line
        # receives the :update_attributes message with whatever params are
        # submitted in the request.
        Subject.any_instance.should_receive(:update).with({ "school" => "" })
        put :update, {:id => subject.to_param, :subject => { "school" => "" }}, valid_session
      end

      it "assigns the requested subject as @subject" do
        subject = Subject.create! valid_attributes
        put :update, {:id => subject.to_param, :subject => valid_attributes}, valid_session
        assigns(:subject).should eq(subject)
      end

      it "redirects to the subject" do
        subject = Subject.create! valid_attributes
        put :update, {:id => subject.to_param, :subject => valid_attributes}, valid_session
        response.should redirect_to(subject)
      end
    end

    describe "with invalid params" do
      it "assigns the subject as @subject" do
        subject = Subject.create! valid_attributes
        # Trigger the behavior that occurs when invalid params are submitted
        Subject.any_instance.stub(:save).and_return(false)
        put :update, {:id => subject.to_param, :subject => { "school" => "invalid value" }}, valid_session
        assigns(:subject).should eq(subject)
      end

      it "re-renders the 'edit' template" do
        subject = Subject.create! valid_attributes
        # Trigger the behavior that occurs when invalid params are submitted
        Subject.any_instance.stub(:save).and_return(false)
        put :update, {:id => subject.to_param, :subject => { "school" => "invalid value" }}, valid_session
        response.should render_template("edit")
      end
    end
  end

  describe "DELETE destroy" do
    it "destroys the requested subject" do
      subject = Subject.create! valid_attributes
      expect {
        delete :destroy, {:id => subject.to_param}, valid_session
      }.to change(Subject, :count).by(-1)
    end

    it "redirects to the subjects list" do
      subject = Subject.create! valid_attributes
      delete :destroy, {:id => subject.to_param}, valid_session
      response.should redirect_to(subjects_url)
    end
  end

end
